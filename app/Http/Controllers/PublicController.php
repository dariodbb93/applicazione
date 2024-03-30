<?php

namespace App\Http\Controllers;

use Fpdf\Fpdf;
use App\Models\Item;
use App\Models\Order;
use App\Models\Contact;
use App\Models\OrderItems;
use Com\Tecnick\Pdf\Tcpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PublicController extends Controller
{

    public function index()
    {
        $contacts = Contact::orderBy('nameContact', 'asc')->get();
        return view('index', compact('contacts'));
    }

    public function salvaContatto()
    {
        return view('salvaContatto');
    }


    public function storageContact(Request $request)
    {
        $nameContact = $request->input('nameContact');
        $tel = $request->input('tel');
        $newContact = Contact::create([
            'nameContact' => $nameContact,
            'tel' => $tel

        ]);

        return redirect(route('index'));
    }

    public function creaOrdine()
    {
        $items = Item::all();
        $contacts = Contact::orderBy('nameContact', 'asc')->get();
        return view('creaOrdine', compact('contacts', 'items'));



        return view('creaOrdine');
    }

    public function storageOrder(Request $request)
    {


        $selectedItems = $request->input('item_id');

        $order = Order::create([

            'contact_id' => $request->input('contact_id'),
            'ritiro' => Carbon::parse($request->input('ritiro')),
        ]);

        foreach ($selectedItems as $item_id) {

            OrderItems::create([

                'order_id' => $order->id,
                'item_id' => $item_id,
                'quantity' => $request->input("quantity.$item_id"),
                'weight' => $request->input("weight.$item_id"),

            ]);
        }
        $order->update(['order_items_id' => $order->orderItems()->orderBy('id')->first()->id]);


        return redirect(route('view'))->with('success', 'Ordine creato con successo!');
    }



    public function edit(Order $order)
    {

        $items = Item::all();
        $contacts = Contact::orderBy('nameContact', 'asc')->get();

        return view('edit', compact('contacts', 'items', 'order'));
    }


    public function updateOrder(Request $request, Order $order)
    {
        // Aggiorna i dettagli dell'ordine
        $order->update([
            'ritiro' => Carbon::parse($request->input('ritiro')),
            // Aggiungi qui altri campi che desideri aggiornare
        ]);

        // Ottieni i valori degli item selezionati dal form
        $selectedItems = $request->input('item_id');

        // Seleziona solo gli item che non sono già associati all'ordine
        $existingItems = $order->orderItems()->pluck('item_id');
        $newItems = array_diff($selectedItems, $existingItems->toArray());

        // Aggiungi nuovi articoli all'ordine
        foreach ($newItems as $item_id) {
            OrderItems::create([
                'order_id' => $order->id,
                'item_id' => $item_id,
                'quantity' => $request->input("quantity.$item_id"),
                'weight' => $request->input("weight.$item_id"),
            ]);
        }

        // Aggiorna gli articoli esistenti
        foreach ($selectedItems as $item_id) {
            OrderItems::where('order_id', $order->id)
                ->where('item_id', $item_id)
                ->update([
                    'quantity' => $request->input("quantity.$item_id"),
                    'weight' => $request->input("weight.$item_id"),
                ]);
        }

        // Reindirizza l'utente alla vista dei dettagli dell'ordine con un messaggio di successo
        return redirect(route('view'))->with('success', 'Ordine aggiornato con successo!');
    }




    public function view()
    {
        $orders = Order::with(['contact', 'orderItems.item'])->latest()->get();

        $orderDetails = $orders->map(function ($order) {
            return [
                'order_id' => $order->id,
                'order_date' => $order->created_at,
                'ritiro' => $order->ritiro,
                'contact' => $order->contact->nameContact,
                'items' => $order->orderItems->map(function ($orderItem) {
                    return optional($orderItem->item)->name;
                })->implode(', '),
                'quantity' => $order->orderItems->sum('quantity'),
                'weight' => $order->orderItems->sum('weight'),
                'tel' => $order->contact->tel,
            ];
        });

        // Ordina $orderDetails in modo decrescente rispetto all'id
        $orderDetails = $orderDetails->sortByDesc('order_id');

        return view('view', compact('orderDetails'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect(route('view'));
    }

    public function riepilogo()
    {

        return view('riepilogo');
    }


    public function getContactDetails(Request $request)
    {

        $contacts = Contact::all();
        $selectedContactId = $request->input('contact');
        $selectedContact = Contact::find($selectedContactId);

        return view('index', compact('contacts'), ['selectedContact' => $selectedContact]);
    }

    //protezione delle rotte tramite middleware

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'login']);
    }



    public function export(Order $order)
    {
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', '', 16);
        $pdf->AddPage();

        $pdf->MultiCell(
            0,
            10,
            "Ordine di Ritiro: " . "\n" .
                "Numero Ordine: " . $order->id . "\n" .
                "Data Ordine: " . $order->created_at . "\n" .
                "Data di ritiro: " . $order->ritiro . "\n" .
                "Cliente: " . $order->contact->nameContact . "\n" .
                "Articoli: " . $order->orderItems->map(function ($orderItem) {
                    return optional($orderItem->item)->name;
                })->implode(', ') . "\n" .
                "Quantita' totale: " . $order->orderItems->pluck('quantity') . "\n" .
                "Peso totale (Kg): " . $order->orderItems->pluck('weight')
        );


        $output = $pdf->Output('', 'S');

        return Response::make($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="ordine.pdf"',
        ]);
    }
}



class PDF extends Fpdf
{
    public function __construct(
        $orientation = 'P',
        $unit = 'mm',
        $size = 'letter'
    ) {
        parent::__construct($orientation, $unit, $size);
        // ...
    }
}

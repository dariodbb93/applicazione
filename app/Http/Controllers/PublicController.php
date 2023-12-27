<?php

namespace App\Http\Controllers;



use App\Models\Order;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\OrderItems;

class PublicController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('index', compact('contacts'));
    }

    public function salvaContatto()
    {
        return view('salvaContatto');
    }


    public function storageContact(Request $request)
    {

        $name = $request->input('name');
        $contatti = Contact::create([
            'name' => $name

        ]);

        return redirect(route('index'));
    }

    public function creaOrdine()
    {
        $items = Item::all();
        $contacts = Contact::all();
        return view('creaOrdine', compact('contacts', 'items'));



        return view('creaOrdine');
    }

    public function storageOrder(Request $request)
    {

        $selectedItems = $request->input('item_id');

        $order = Order::create([
            'time' => $request->input('time'),
            'contact_id' => $request->input('contact_id'),
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


        return redirect(route('index'))->with('success', 'Ordine creato con successo!');
    }



    public function view()
    {

        $items = Item::all();
        // $orders = Order::all();
        $orders = Order::with(['contact', 'orderItems.item'])->get();


        $orderDetails = $orders->map(function ($order) {
            return [
                'order_id' => $order->id,
                'time' => $order->time,
                'contact' => $order->contact->name,
                'items' => $order->orderItems->map(function ($orderItem) {
                    return optional($orderItem->item)->name;
                })->implode(', '),
                'quantity' => $order->orderItems->sum('quantity'), // Modifica qui
                'weight' => $order->orderItems->sum('weight'), // Modifica qui
            ];
        });
        return view('view', compact('orderDetails'));
    }
}

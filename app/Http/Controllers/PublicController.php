<?php

namespace App\Http\Controllers;



use App\Models\Order;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Item;


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
        $items= Item::all();
        $contacts = Contact::all();
        return view('creaOrdine', compact('contacts', 'items'));



        return view('creaOrdine');
    }

    public function storageOrder(Request $request)
    {


        $order = Order::create([


            'quantity' => $request->input('quantity'),
            'weight' => $request->input('weight'),
            'time' => $request->input('time'),
            'contact_id' => $request->input('contact_id'),
            'item_id' => $request->input('item_id')
    

        ]);

        return redirect(route('index'))->with('success', 'Ordine creato con successo!');
    }













}

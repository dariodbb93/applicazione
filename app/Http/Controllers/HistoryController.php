<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\Contact;
use App\Models\OrderItems;

class HistoryController extends Controller
{

    public function history(Contact $contacts)
    {

        $contacts = Contact::orderBy('nameContact', 'asc')->paginate();
        return view('history', compact('contacts'));
    }


    public function historyDetail(Request $request)
    {

        $contactId = $request->input('id');
        $orders = Order::where('contact_id', $contactId)->get();
        return view('historyDetail', compact('orders'));

    }
}

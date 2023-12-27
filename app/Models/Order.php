<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'Orders'; // Assicurati che il nome della tabella sia corretto

    protected $fillable = ['quantity', 'weight', 'time', 'contact_id', 'order_items_id'];


    public function contact()
    {

        return $this->belongsTo(Contact::class, 'contact_id');
        return $this->belongsTo(Contact::class, 'order_item_id');
    }

    public function orderItems()
    {
        return $this->hasOne(OrderItems::class, 'order_id');
    }
}

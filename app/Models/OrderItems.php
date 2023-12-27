<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'Order_items';
    protected $fillable = ['order_id', 'item_id'];
    public $incrementing = false;
    // Altri attributi, se necessario


    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    
}

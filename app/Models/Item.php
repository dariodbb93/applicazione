<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'Items';

    protected $fillable = ['name'];


    public function orderItems()
{
    return $this->hasMany(OrderItems::class);
}




}

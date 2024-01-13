<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'Contacts';

    protected $fillable = ['nameContact', 'tel'];


    public function Order()
{
    return $this->hasMany(Order::class);
}




}

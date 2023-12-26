<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'Items'; // Assicurati che il nome della tabella sia corretto

    protected $fillable = ['description'];

}

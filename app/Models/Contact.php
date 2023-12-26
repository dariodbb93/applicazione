<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'Contacts'; // Assicurati che il nome della tabella sia corretto

    protected $fillable = ['name'];
}

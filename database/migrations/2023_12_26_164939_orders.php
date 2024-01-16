<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id'); // Aggiunta la colonna contact_id
            $table->foreign('contact_id')->references('id')->on('Contacts')->onDelete('cascade');
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('Orders');
    }
};

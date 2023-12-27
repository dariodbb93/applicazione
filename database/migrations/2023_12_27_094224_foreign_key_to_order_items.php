<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_items_id')->nullable();
            $table->foreign(['order_items_id'])->references(['id'])->on('Order_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Orders', function (Blueprint $table) {
            // Rimuovi la chiave esterna
            $table->dropForeign(['order_items_id']);
        });
    }
};


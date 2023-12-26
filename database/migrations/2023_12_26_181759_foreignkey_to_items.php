<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->foreignId('item_id')->constrained('Items');
        });
    }

    public function down()
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropColumn('item_id');

        });
    }
};


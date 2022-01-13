<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Purchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('checkout_id')->references('id')->on('checkout')->onDelete('cascade');
            $table->foreignId('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->foreignId('payment_method_id')->references('id')->on('payment_method')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

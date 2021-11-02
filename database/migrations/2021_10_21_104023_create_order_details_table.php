<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_order_dt', function (Blueprint $table) {
            $table->Increments('order_dt_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpl_order_dt');
    }
}

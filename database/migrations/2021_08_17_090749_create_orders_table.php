<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_order', function (Blueprint $table) {
            $table->Increments('order_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('status')->default('1');
            $table->text('note')->nullable();
            $table->string('address');
            $table->string('phone',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

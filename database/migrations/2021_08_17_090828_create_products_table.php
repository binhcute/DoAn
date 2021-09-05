<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->integer('cate_id');
            $table->integer('user_id');
            $table->integer('port_id');
            $table->string('product_name',100);
            $table->string('product_img');
            $table->string('product_img_hover')->nullable();
            $table->integer('product_price');
            $table->string('product_color',100)->nullable();
            $table->text('product_description')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('product_keyword',50)->nullable();
            $table->integer('status');
            $table->integer('view')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

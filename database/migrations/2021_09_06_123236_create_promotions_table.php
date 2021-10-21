<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_promotion', function (Blueprint $table) {
            $table->Increments('promotion_id');
            $table->string('promotion_name');
            $table->integer('promotion_key')->nullable();
            $table->integer('promotion_money')->nullable();
            $table->timestamps();
            $table->datetime('end_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}

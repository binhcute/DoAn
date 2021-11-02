<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_category', function (Blueprint $table) {
            $table->Increments('cate_id');
            $table->integer('user_id');
            $table->string('cate_name',100);
            $table->string('cate_img')->nullable();
            $table->text('cate_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('status');
            $table->integer('view')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpl_category');
    }
}


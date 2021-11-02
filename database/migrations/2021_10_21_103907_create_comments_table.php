<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_comment', function (Blueprint $table) {
            $table->Increments('comment_id');
            $table->integer('user_id');
            $table->integer('product_id')->nullable();
            $table->integer('article_id')->nullable();
            $table->integer('rate');
            $table->integer('role');
            $table->text('comment_description');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpl_comment');
    }
}


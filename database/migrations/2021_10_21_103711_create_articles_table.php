<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_article', function (Blueprint $table) {
            $table->Increments('article_id');
            $table->integer('user_id');
            $table->string('article_name',100);
            $table->string('article_img');
            $table->string('article_description');
            $table->text('article_detail');
            $table->string('article_keyword',50)->nullable();
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
        Schema::dropIfExists('tpl_article');
    }
}

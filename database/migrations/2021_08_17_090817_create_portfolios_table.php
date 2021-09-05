<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_portfolio', function (Blueprint $table) {
            $table->Increments('port_id');
            $table->integer('user_id');
            $table->string('port_name',100);
            $table->string('port_origin')->nullable();
            $table->string('port_avatar')->nullable();
            $table->string('port_img')->nullable();
            $table->text('port_description')->nullable();
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
        Schema::dropIfExists('portfolios');
    }
}

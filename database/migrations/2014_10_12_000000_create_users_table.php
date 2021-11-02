<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastName',50);
            $table->string('firstName',50);
            $table->string('username',50)->unique();
            $table->string('avatar')->nullable();
            $table->integer('gender')->nullable();
            $table->string('phone',10)->nullable();
            $table->string('address')->nullable();
            $table->string('email',100)->nullable();
            $table->string('password');
            $table->integer('level');
            $table->rememberToken();
            $table->date('birthday')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('status')->default(1);
            $table->string('code')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

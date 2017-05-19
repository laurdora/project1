<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisteredUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('username')->unique(); 
            $table->string('password');
            $table->string('email')->unique();
            $table->string('usertype');
            $table->string('company');
            $table->string('address');
            $table->string('state');
            $table->string('country');
            $table->integer('zip');
            $table->string('phonenum');
            $table->rememberToken();
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
        Schema::dropIfExists('registered_users');
    }
}

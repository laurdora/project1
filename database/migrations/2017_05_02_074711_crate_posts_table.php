<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CratePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('Post_id')->unique(); //id int auto_increment primary key
            $table->integer('registered_user_id');
            $table->string('username');
            $table->string('usertype');            
            $table->string('item_category');
            $table->string('price')->nullable();
            $table->string('title',100); //title varchar(100)
            $table->string('description'); //body text
            $table->binary('image')->nullable();
            $table->timestamps(); //created_at timestamp, updated_at timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts'); //drop table posts
    }
}
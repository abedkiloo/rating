<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('user_rated_id')->index()->unsigned();
            $table->integer('rating_score');
            $table->timestamps();
        });
//        Schema::table('rating', function($table) {
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('user_rated_id')->references('id')->on('users');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

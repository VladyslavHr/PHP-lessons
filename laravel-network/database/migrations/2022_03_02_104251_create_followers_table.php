<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->bigInteger('current_user_id')->unsigned();
            $table->bigInteger('friend_user_id')->unsigned();

            $table->foreign('current_user_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('friend_user_id')->on('users')->references('id')->onDelete('cascade');
        });


        // Schema::table('followers', function($table) {
        //     $table->foreign('current_user_id')->on('users')->references('id')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('pharmacy_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->tinyInteger('mark_1')->default(0);
            $table->tinyInteger('mark_2')->default(0);
            $table->tinyInteger('mark_3')->default(0);
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
        Schema::dropIfExists('marks');
    }
}

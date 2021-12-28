<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarksToPharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pharmacies', function (Blueprint $table) {
            $table->tinyInteger('cart1_mark1')->default(0);
            $table->tinyInteger('cart1_mark2')->default(0);
            $table->tinyInteger('cart1_mark3')->default(0);
            $table->tinyInteger('cart1_mark4')->default(0);
            $table->tinyInteger('cart2_mark1')->default(0);
            $table->tinyInteger('cart2_mark2')->default(0);
            $table->tinyInteger('cart2_mark3')->default(0);
            $table->tinyInteger('cart2_mark4')->default(0);
            $table->tinyInteger('cart3_mark1')->default(0);
            $table->tinyInteger('cart3_mark2')->default(0);
            $table->tinyInteger('cart3_mark3')->default(0);
            $table->tinyInteger('cart3_mark4')->default(0);
            $table->tinyInteger('cart4_mark1')->default(0);
            $table->tinyInteger('cart4_mark2')->default(0);
            $table->tinyInteger('cart4_mark3')->default(0);
            $table->tinyInteger('cart4_mark4')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pharmacies', function (Blueprint $table) {
            $table->dropColumn('cart1_mark1');
            $table->dropColumn('cart1_mark2');
            $table->dropColumn('cart1_mark3');
            $table->dropColumn('cart1_mark4');
            $table->dropColumn('cart2_mark1');
            $table->dropColumn('cart2_mark2');
            $table->dropColumn('cart2_mark3');
            $table->dropColumn('cart2_mark4');
            $table->dropColumn('cart3_mark1');
            $table->dropColumn('cart3_mark2');
            $table->dropColumn('cart3_mark3');
            $table->dropColumn('cart3_mark4');
            $table->dropColumn('cart4_mark1');
            $table->dropColumn('cart4_mark2');
            $table->dropColumn('cart4_mark3');
            $table->dropColumn('cart4_mark4');
        });
    }
}

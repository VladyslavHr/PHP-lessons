<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('last_name')->nullable()->after('name');
        $table->string('phone')->nullable()->after('email');
        $table->timestamp('birth_date')->nullable();
        $table->string('city')->nullable();
        $table->string('birth_city')->nullable();
        $table->string('work')->nullable();
        $table->string('study')->nullable();
        $table->string('family_status')->nullable();
        $table->text('about_yourself')->nullable();
        $table->text('cart')->nullable(true);
        $table->string('cover_photo')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
            $table->dropColumn('birth_date');
            $table->dropColumn('city');
            $table->dropColumn('birth_city');
            $table->dropColumn('work');
            $table->dropColumn('study');
            $table->dropColumn('family_status');
            $table->dropColumn('about_yourself');
            $table->dropColumn('cart');
            $table->dropColumn('cover_photo');
        });
    }
}

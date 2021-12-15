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
            $table->id();
            $table->string('name'); // varchar
            $table->string('email')->unique(); // key unique
            $table->timestamp('email_verified_at')->nullable(); // время создания
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('role', 20,)->default('user');
            $table->string('avatar', 200);
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

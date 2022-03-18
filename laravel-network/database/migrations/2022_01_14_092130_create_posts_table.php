<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id')->unsigned();
            $table->string('title');
            $table->longText('content');
            $table->text('images')->nullable();
            $table->enum('post_status', ['public', 'protected']);
            $table->tinyInteger('allow_comments')->default('0');
            $table->integer('postable_id');
            $table->string('postable_type');
            $table->integer('comments_count');
            $table->timestamps();
        });


        Schema::table('posts', function($table) {
            $table->foreign('author_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

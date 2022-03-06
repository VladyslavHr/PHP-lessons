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
            $table->integer('author_id');
            $table->string('title');
            $table->longText('content');
            $table->enum('post_status', ['public', 'protected']);
            $table->tinyInteger('allow_comments')->default('0');
            $table->integer('postable_id');
            $table->string('postable_type');
            $table->integer('comments_count');
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
        Schema::dropIfExists('posts');
    }
}

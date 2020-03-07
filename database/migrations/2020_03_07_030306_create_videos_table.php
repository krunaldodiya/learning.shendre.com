<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('chapter_id');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('topic_id');
            $table->foreign('topic_id')->references('id')->on('topics')->onUpdate('cascade')->onDelete('cascade');

            $table->string("thumbnail")->nullable();
            $table->string("title");
            $table->text("description");
            $table->string("url");
            $table->integer("order")->nullable();

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
        Schema::dropIfExists('videos');
    }
}

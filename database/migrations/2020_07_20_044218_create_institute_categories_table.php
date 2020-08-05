<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_categories', function (Blueprint $table) {
            $table->primary(['institute_id', 'category_id']);

            $table->uuid("institute_id");
            $table->foreign('institute_id')->references('id')->on('institutes')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid("category_id");
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamp("expires_at");

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
        Schema::dropIfExists('institute_categories');
    }
}

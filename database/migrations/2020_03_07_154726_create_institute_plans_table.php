<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_plans', function (Blueprint $table) {
            $table->primary(['institute_id', 'plan_id']);

            $table->uuid('institute_id');
            $table->foreign('institute_id')->references('id')->on('institutes')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institute_plans');
    }
}

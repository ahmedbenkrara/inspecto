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
        Schema::create('request', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('phone');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('problem_id');
            $table->foreign('car_id')->references('id')->on('car')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problem')->onDelete('cascade');
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
        Schema::dropIfExists('request');
    }
};

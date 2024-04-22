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
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedInteger('generation_id')->nullable();
            $table->unsignedInteger('motorisation_id');
            $table->foreign('generation_id')->references('id')->on('generation')->onDelete('cascade');
            $table->foreign('motorisation_id')->references('id')->on('motorisation')->onDelete('cascade');
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
        Schema::dropIfExists('car');
    }
};

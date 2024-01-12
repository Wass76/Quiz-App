<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->string('answer4');
            $table->string('answer5')->nullable();
            $table->string('answer6')->nullable();
            $table->string('answer7')->nullable();
            $table->string('answer8')->nullable();
            $table->string('answer9')->nullable();
            $table->string('answer10')->nullable();
            $table->integer('rank')->default(1);
            $table->string('category')->default('normal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};

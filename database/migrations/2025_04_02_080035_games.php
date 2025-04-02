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
        //
        Schema::create('games', function (Blueprint $table){
            $table->id() -> primary();
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->bigInteger('developer');
            $table->timestamps();
        });
        Schema::create('genre', function (Blueprint $table){
            $table ->id() -> primary();
            $table->string('name');
        });
        Schema::create('genre_details', function (Blueprint $table){
            $table->id() -> primary();
            $table->bigInteger('game');
            $table->bigInteger('genre');
            $table->timestamps();
        });
        Schema::create('review', function (Blueprint $table){
            $table->id() -> primary();
            $table->string('content');
            $table->bigInteger('game');
            $table->bigInteger('user');
            $table->timestamps();
        });
        Schema::create('library', function (Blueprint $table){
            $table->id() -> primary();
            $table->bigInteger('game');
            $table->bigInteger('user');
            $table->bigInteger('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

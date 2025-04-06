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
            $table->foreignId('developer_id')->constrained(table: 'developers');
            $table->timestamps();
        });
        Schema::create('genres', function (Blueprint $table){
            $table ->id() -> primary();
            $table->string('name');
        });
        Schema::create('genre_details', function (Blueprint $table){
            $table->id() -> primary();
            $table->foreignId('games_id')->constrained(table: 'games');
            $table->foreignId('genre_id')->constrained(table: 'genres');
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table){
            $table->id() -> primary();
            $table->string('content');
            $table->foreignId('games_id')->constrained(table: 'games');
            $table->foreignId('users_id')->constrained(table: 'users');
            $table->timestamps();
        });
        Schema::create('libraries', function (Blueprint $table){
            $table->id() -> primary();
            $table->foreignId('game_id')->constrained(table: 'games');
            $table->foreignId('user_id')->constrained(table: 'users');
            $table->bigInteger('rating')->nullable();
            $table->timestamps();
        });
        Schema::create('screenshots', function (Blueprint $table){
            $table->id() -> primary();
            $table->string('image');
            $table->foreignId('games_id')->constrained(table: 'games');
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

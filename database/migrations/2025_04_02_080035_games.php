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
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->foreignId('developer_id')->constrained();
            $table->timestamps();
        });
        Schema::create('genres', function (Blueprint $table){
            $table ->id();
            $table->string('name');
        });
        Schema::create('genre_details', function (Blueprint $table){
            $table->id() -> primary();
            $table->foreignId('game_id')->constrained();
            $table->foreignId('genre_id')->constrained();
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table){
            $table->id();
            $table->string('content');
            $table->foreignId('game_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
        Schema::create('libraries', function (Blueprint $table){
            $table->id();
            $table->foreignId('game_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('rating')->nullable();
            $table->boolean('downloaded')->default(false);
            $table->timestamps();
        });
        Schema::create('screenshots', function (Blueprint $table){
            $table->id();
            $table->string('image');
            $table->foreignId('game_id')->constrained();
            $table->timestamps();
        });
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::dropIfExists('screenshots');
    Schema::dropIfExists('libraries');
    Schema::dropIfExists('reviews');
    Schema::dropIfExists('genre_details');
    Schema::dropIfExists('genres');
    Schema::dropIfExists('games');


    }
};

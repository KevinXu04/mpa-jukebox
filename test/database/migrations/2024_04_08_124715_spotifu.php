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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('password');
            
        // });

        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('author');
            $table->integer('genres_id');
        });
        
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('saved_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
        });

        Schema::create('saved_lists_songs', function (Blueprint $table) {
            $table->id();
            $table->integer('saved_lists_id');
            $table->integer('song_id');
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

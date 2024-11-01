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
    Schema::table('genres', function (Blueprint $table) {
      $table->dropTimestamps(); 
    });

    Schema::table('movies', function (Blueprint $table) {
      $table->dropTimestamps(); 
    });

    Schema::table('genre_movie', function (Blueprint $table) {
      $table->dropTimestamps(); 
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('genres', function (Blueprint $table) {
      $table->timestamps(); 
    });

    Schema::table('movies', function (Blueprint $table) {
      $table->timestamps(); 
    });

    Schema::table('genre_movie', function (Blueprint $table) {
      $table->timestamps();
    });
  }
};

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
    Schema::create('hero_sections', function (Blueprint $table) {
      $table->id();
      $table->text('image');
      $table->text('title');
      $table->text('subtitle');
      $table->text('button_name');
      $table->text('button_link');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('hero_sections');
  }
};

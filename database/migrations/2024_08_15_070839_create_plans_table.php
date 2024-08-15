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
    Schema::create('plans', function (Blueprint $table) {
      $table->id();
      $table->string('label');
      $table->integer('price');
      $table->integer('job_count');
      $table->integer('featured_job_count');
      $table->boolean('company_featured_show')->default(0);
      $table->boolean('company_verified_show')->default(0);
      $table->boolean('recommended')->default(0);
      $table->boolean('status')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('plans');
  }
};

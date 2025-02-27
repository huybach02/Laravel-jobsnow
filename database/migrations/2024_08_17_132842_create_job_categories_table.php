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
    Schema::create('job_categories', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('slug');
      $table->boolean("status");
      $table->boolean("is_featured")->default(1);
      $table->boolean("is_job_featured")->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('job_categories');
  }
};

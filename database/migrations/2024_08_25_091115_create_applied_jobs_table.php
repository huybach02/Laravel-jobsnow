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
    Schema::create('applied_jobs', function (Blueprint $table) {
      $table->id();
      $table->foreignId('job_id');
      $table->foreignId('candidate_id');
      $table->text("message")->nullable();
      $table->string("status")->default("pending");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('applied_jobs');
  }
};

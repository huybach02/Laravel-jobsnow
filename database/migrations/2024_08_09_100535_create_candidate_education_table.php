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
    Schema::create('candidate_educations', function (Blueprint $table) {
      $table->id();
      $table->foreignId("candidate_id")->constrained("candidates")->onDelete("cascade");
      $table->text("name_education")->nullable();
      $table->text("training_unit")->nullable();
      $table->string("start_date")->nullable();
      $table->string("end_date")->nullable();
      $table->string("rating")->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('candidate_educations');
  }
};

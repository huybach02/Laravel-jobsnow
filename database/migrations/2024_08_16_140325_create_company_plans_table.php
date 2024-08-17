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
    Schema::create('company_plans', function (Blueprint $table) {
      $table->id();
      $table->foreignId("company_id")->constrained("companies")->onDelete("cascade");
      $table->foreignId("plan_id")->constrained("plans")->onDelete("cascade");
      $table->string("plan_name");
      $table->double("plan_price");
      $table->double("job_count");
      $table->double("featured_job_count");
      $table->boolean("company_featured_show");
      $table->boolean("company_verified_show");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('company_plans');
  }
};

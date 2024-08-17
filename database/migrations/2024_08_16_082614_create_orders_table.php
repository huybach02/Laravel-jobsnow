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
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->string("order_id");
      $table->foreignId("company_id")->constrained("companies");
      $table->foreignId("plan_id");
      $table->string("plan_name");
      $table->double("price");
      $table->string("transaction_id");
      $table->string("method");
      $table->string("currency_name");
      $table->enum("status", ["pending", "paid", "deny"]);

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
    Schema::dropIfExists('orders');
  }
};

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
    Schema::create('commune_wards', function (Blueprint $table) {
      $table->id();
      $table->foreignId("district_id")->constrained("districts")->onDelete("cascade");
      $table->foreignId("province_city_id");
      $table->string('name');
      $table->string('slug')->nullable();
      $table->integer("code")->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('commune_wards');
  }
};
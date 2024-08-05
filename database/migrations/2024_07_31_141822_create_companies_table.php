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
    Schema::create('companies', function (Blueprint $table) {
      $table->id();
      $table->foreignId("user_id")->constrained("users");
      $table->text("name")->nullable();
      $table->text("slug")->nullable();
      $table->foreignId("industry_type_id")->constrained("industry_types")->onDelete("cascade");
      $table->foreignId("organization_type_id")->constrained("organization_types")->onDelete("cascade");
      $table->foreignId("team_size_id")->constrained("team_sizes")->onDelete("cascade");
      $table->string("logo")->nullable();
      $table->string("banner")->nullable();
      $table->date("established_date")->nullable();
      $table->text("bio")->nullable();
      $table->text("vision")->nullable()->nullable();
      $table->integer("total_views")->default(0)->nullable();
      $table->text("address")->nullable();

      $table->foreignId("province")->nullable();
      $table->foreignId("district")->nullable();
      $table->foreignId("ward")->nullable();

      $table->string("phone")->nullable();
      $table->string("email")->nullable();
      $table->text("map_link")->nullable();
      $table->string("tax_code")->nullable();
      $table->boolean("is_profile_verified")->default(0);
      $table->boolean("document_verified_at")->nullable();
      $table->boolean("profile_completed")->default(0);
      $table->boolean("visibility")->default(0);
      $table->boolean("status")->default(0);
      $table->text("fb_link")->nullable();
      $table->text("website_link")->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('companies');
  }
};

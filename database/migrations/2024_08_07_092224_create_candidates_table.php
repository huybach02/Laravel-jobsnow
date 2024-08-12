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
    Schema::create('candidates', function (Blueprint $table) {
      $table->id();
      $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
      $table->text("image")->nullable();
      $table->string("full_name")->nullable();
      $table->string("slug")->nullable();
      $table->enum("gender", ["male", "female"])->nullable();
      $table->string("phone")->nullable();
      $table->string("email")->nullable();
      $table->text("cv_link")->nullable();
      $table->text("bio")->nullable();
      $table->enum("marital_status", ["single", "married"])->nullable();
      $table->date("birthday")->nullable();
      $table->foreignId("employment_level_id")->nullable();
      $table->foreignId("desired_salary_id")->nullable();
      $table->text("career_goals")->nullable();

      $table->foreignId("province")->nullable();
      $table->foreignId("district")->nullable();
      $table->foreignId("ward")->nullable();
      $table->text("address")->nullable();
      $table->text("workplace_desired")->nullable();
      $table->text("fb_link")->nullable();


      $table->text("title")->nullable();

      $table->foreignId("profession_id")->nullable();
      $table->foreignId("experience_id")->nullable();
      $table->foreignId("experience_work_id")->nullable();
      $table->foreignId("education_id")->nullable();
      $table->foreignId("academic_level_id")->nullable();
      $table->text("advanced_skills")->nullable();
      $table->text("soft_skills")->nullable();
      $table->text("computer_skills")->nullable();
      $table->text("foreign_languages")->nullable();

      $table->boolean("status")->default(0);
      $table->boolean("profile_completed")->default(0);
      $table->integer("view_count")->default(0);
      $table->boolean("allow_showing")->default(1);

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('candidates');
  }
};

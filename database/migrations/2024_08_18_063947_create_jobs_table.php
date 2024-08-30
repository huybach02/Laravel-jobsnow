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
    Schema::create('jobs', function (Blueprint $table) {
      $table->id();
      $table->text('title');
      $table->text("slug");
      $table->foreignId("company_id")->constrained("companies")->onDelete("cascade");
      $table->text("job_category");
      $table->string("employment_level");
      $table->string("salary_structure");
      $table->double("salary_min");
      $table->double("salary_max");
      $table->date("deadline");
      $table->string("experience");
      $table->string("academic_level");
      $table->string("gender");
      $table->integer("quantity");
      $table->string("work_mode");
      $table->foreignId("province");
      $table->foreignId("district");
      $table->foreignId("ward");
      $table->text("address");
      $table->text("description");
      $table->text("requirement");
      $table->text("advanced_skills");
      $table->text("soft_skills");
      $table->text("computer_skills");
      $table->text("foreign_languages");
      $table->text("benefits");
      $table->text("request_to_apply");
      $table->text("contact_person");
      $table->text("contact_email");
      $table->text("contact_phone");
      $table->integer("view_count")->default(0);
      $table->boolean("is_featured")->default(0);
      $table->boolean("status")->default(1);
      $table->boolean("is_blocked")->default(0);

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('jobs');
  }
};

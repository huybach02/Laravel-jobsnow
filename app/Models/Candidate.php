<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
  use HasFactory;

  protected $fillable = ["user_id", "full_name", "slug", "birthday", "gender", "marital_status", "profession_id", "experience_id", "employment_level_id", "desired_salary_id", "bio", "career_goals", "image", "cv_link", "province", "district", "ward", "address", "workplace_desired", "fb_link", "email", "phone", "academic_level_id", "soft_skills", "foreign_languages", "advanced_skills", "computer_skills"];
}

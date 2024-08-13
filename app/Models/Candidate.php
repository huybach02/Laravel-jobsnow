<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
  use HasFactory;

  protected $fillable = ["user_id", "full_name", "slug", "birthday", "gender", "marital_status", "profession_id", "experience_id", "employment_level_id", "desired_salary_id", "bio", "career_goals", "image", "cv_link", "province", "district", "ward", "address", "workplace_desired", "fb_link", "email", "phone", "academic_level_id", "soft_skills", "foreign_languages", "advanced_skills", "computer_skills"];

  public function profession()
  {
    return $this->belongsTo(Profession::class, "profession_id");
  }

  public function experience()
  {
    return $this->belongsTo(Experience::class, "experience_id");
  }

  public function employmentLevel()
  {
    return $this->belongsTo(EmploymentLevel::class, "employment_level_id");
  }

  public function academicLevel()
  {
    return $this->belongsTo(AcademicLevel::class, "academic_level_id");
  }

  public function candidateProvince()
  {
    return $this->belongsTo(ProvinceCity::class, "province", "code");
  }

  public function candidateDistrict()
  {
    return $this->belongsTo(District::class, "district", "code");
  }

  public function candidateWard()
  {
    return $this->belongsTo(CommuneWard::class, "ward", "code");
  }

  public function desiredSalary()
  {
    return $this->belongsTo(DesiredSalary::class, "desired_salary_id");
  }
}

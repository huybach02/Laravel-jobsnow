<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  use HasFactory;

  public function company()
  {
    return $this->belongsTo(Company::class);
  }

  public function applications()
  {
    return $this->hasMany(AppliedJob::class, "job_id", "id");
  }

  public function jobProvince()
  {
    return $this->belongsTo(ProvinceCity::class, "province", "code");
  }

  public function jobDistrict()
  {
    return $this->belongsTo(District::class, "district", "code");
  }

  public function jobWard()
  {
    return $this->belongsTo(CommuneWard::class, "ward", "code");
  }

  public function getJobCategoryNames(): array
  {
    return JobCategory::whereIn('id', explode(',', $this->job_category))
      ->pluck('name')
      ->toArray();
  }

  public function getWorkMode()
  {
    return WorkMode::where("slug", $this->work_mode)->first();
  }

  public function getEmploymentLevel()
  {
    return EmploymentLevel::where("slug", $this->employment_level)->first();
  }

  public function getExperience()
  {
    return Experience::where("slug", $this->experience)->first();
  }

  public function getAcademicLevel()
  {
    return AcademicLevel::where("slug", $this->academic_level)->first();
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentLevel extends Model
{
  use HasFactory;

  public function jobs()
  {
    return $this->hasMany(Job::class, "employment_level", "slug");
  }

  public function candidates()
  {
    return $this->hasMany(Candidate::class, "employment_level_id", "id");
  }
}

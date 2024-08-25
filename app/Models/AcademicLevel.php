<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicLevel extends Model
{
  use HasFactory;

  public function jobs()
  {
    return $this->hasMany(Job::class, "academic_level", "slug");
  }

  public function candidates()
  {
    return $this->hasMany(Candidate::class, "academic_level_id", "id");
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
  use HasFactory;

  public function jobs()
  {
    return $this->hasMany(Job::class)
      ->whereRaw("FIND_IN_SET(job_categories.id, jobs.job_category)");
  }
}

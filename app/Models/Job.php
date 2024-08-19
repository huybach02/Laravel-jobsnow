<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  use HasFactory;

  public function getJobCategoryNames(): array
  {
    return JobCategory::whereIn('id', explode(',', $this->job_category))
      ->pluck('name')
      ->toArray();
  }
}

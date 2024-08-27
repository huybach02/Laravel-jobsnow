<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
  use HasFactory;

  public function job()
  {
    return $this->belongsTo(Job::class);
  }

  public function candidate()
  {
    return $this->belongsTo(Candidate::class);
  }
}

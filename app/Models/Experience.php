<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
  use HasFactory;

  public function jobs()
  {
    return $this->hasMany(Job::class, "experience", "slug");
  }
}

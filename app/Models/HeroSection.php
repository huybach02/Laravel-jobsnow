<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
  use HasFactory;

  protected $fillable = ['image', 'title', 'subtitle', 'button_name', 'button_link'];
}

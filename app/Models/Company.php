<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  protected $fillable = ["name", "slug", "logo", "banner", "bio", "vision", "user_id", "industry_type_id", "organization_type_id", "team_size_id", "tax_code", "established_date", "email", "phone", "website_link", "fb_link", "province", "district", "ward", "address", "map_link"];
}

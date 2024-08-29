<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  protected $fillable = ["name", "slug", "logo", "banner", "bio", "vision", "user_id", "industry_type_id", "organization_type_id", "team_size_id", "tax_code", "established_date", "email", "phone", "website_link", "fb_link", "province", "district", "ward", "address", "map_link"];

  public function companyProvince()
  {
    return $this->belongsTo(ProvinceCity::class, "province", "code");
  }

  public function companyDistrict()
  {
    return $this->belongsTo(District::class, "district", "code");
  }

  public function companyWard()
  {
    return $this->belongsTo(CommuneWard::class, "ward", "code");
  }

  public function industry()
  {
    return $this->belongsTo(IndustryType::class, "industry_type_id", "id");
  }

  public function organization()
  {
    return $this->belongsTo(OrganizationType::class, "organization_type_id", "id");
  }

  public function teamSize()
  {
    return $this->belongsTo(TeamSize::class, "team_size_id", "id");
  }

  public function jobs()
  {
    return $this->hasMany(Job::class, "company_id", "id");
  }
}

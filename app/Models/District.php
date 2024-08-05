<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  use HasFactory;

  protected $table = "districts";

  protected $primaryKey = 'code';

  public $timestamps = false;

  protected $keyType = 'string';

  public function province()
  {
    return $this->belongsTo(ProvinceCity::class, "province_code", "code");
  }

  public function communeWards()
  {
    return $this->hasMany(CommuneWard::class, "district_code", "code");
  }
}
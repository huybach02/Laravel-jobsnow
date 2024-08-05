<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceCity extends Model
{
  use HasFactory;

  protected $table = "provinces";

  protected $primaryKey = 'code';

  public $timestamps = false;

  protected $keyType = 'string';

  public function districts()
  {
    return $this->hasMany(District::class, "province_code", "code");
  }
}
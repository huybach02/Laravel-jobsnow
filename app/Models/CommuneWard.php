<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommuneWard extends Model
{
  use HasFactory;

  protected $table = "wards";

  protected $primaryKey = 'code';

  protected $keyType = 'string';

  public $timestamps = false;

  public function district()
  {
    return $this->belongsTo(District::class, "district_code", "code");
  }
}
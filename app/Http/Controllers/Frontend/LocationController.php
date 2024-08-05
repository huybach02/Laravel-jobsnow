<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommuneWard;
use App\Models\District;
use Illuminate\Http\Request;

class LocationController extends Controller
{
  public function getDistricts($province_code)
  {
    $districts = District::select("code", "name", "code_name")->where(["province_code" => $province_code, "status" => 1])->get();
    return response($districts);
  }

  public function getWards($district_code)
  {
    $wards = CommuneWard::select("code", "name", "code_name")->where(["district_code" => $district_code, "status" => 1])->get();
    return response($wards);
  }
}

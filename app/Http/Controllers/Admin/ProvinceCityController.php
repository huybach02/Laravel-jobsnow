<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProvinceCity;
use Illuminate\Http\Request;

class ProvinceCityController extends Controller
{
  public function __construct()
  {
    $this->middleware("permission:Truy cập mục QL Địa Điểm");
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $provinces = ProvinceCity::orderBy("code", "asc")->get();

    return view("admin.location.province-city.index", compact("provinces"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

  public function changeStatus(Request $request)
  {
    $provinceCity = ProvinceCity::findOrFail($request->id);
    $provinceCity->status = $request->status == "true" ? 1 : 0;
    $provinceCity->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

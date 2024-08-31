<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
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
    $districts = District::with("province")->orderBy("code", "asc")->get();

    return view("admin.location.district.index", compact("districts"));
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
    $district = District::findOrFail($request->id);
    $district->status = $request->status == "true" ? 1 : 0;
    $district->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

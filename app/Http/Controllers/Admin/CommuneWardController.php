<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommuneWard;
use Illuminate\Http\Request;

class CommuneWardController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $communeWards = CommuneWard::with("district.province")->orderBy("code", "asc")->get();

    return view("admin.location.commune-ward.index", compact("communeWards"));
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
    $communeWard = CommuneWard::findOrFail($request->id);
    $communeWard->status = $request->status == "true" ? 1 : 0;
    $communeWard->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamSize;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamSizeController extends Controller
{
  public function __construct()
  {
    $this->middleware("permission:Truy cập mục QL Thông Tin Tổ Chức");
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $teamSizes = TeamSize::latest()->get();

    return view("admin.team-size.index", compact("teamSizes"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.team-size.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:industry_types,name"],
      "status" => ["required"]
    ]);

    $teamSize = new TeamSize();

    $teamSize->name = $request->name;
    $teamSize->slug = Str::slug($request->name);
    $teamSize->status = $request->status;
    $teamSize->save();

    flash()->addSuccess('Tạo mới quy mô tổ chức thành công!', "Thành công");

    return redirect()->route("admin.team-sizes.index");
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
  public function edit(TeamSize $teamSize)
  {
    return view("admin.team-size.edit", compact("teamSize"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, TeamSize $teamSize)
  {
    $request->validate([
      "name" => ["required", "unique:industry_types,name"],
      "status" => ["required"]
    ]);

    $teamSize->name = $request->name;
    $teamSize->slug = Str::slug($request->name);
    $teamSize->status = $request->status;
    $teamSize->save();

    flash()->addSuccess('Cập nhật quy mô tổ chức thành công!', "Thành công");

    return redirect()->route("admin.team-sizes.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $teamSize = TeamSize::findOrFail($id);
      $teamSize->delete();

      return response([
        "success" => true,
      ]);
    } catch (\Exception $e) {
      return response([
        "success" => false,
      ]);
    }
  }

  public function changeStatus(Request $request)
  {
    $teamSize = TeamSize::findOrFail($request->id);
    $teamSize->status = $request->status == "true" ? 1 : 0;
    $teamSize->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

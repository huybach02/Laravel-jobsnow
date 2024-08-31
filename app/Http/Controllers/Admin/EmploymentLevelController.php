<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmploymentLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmploymentLevelController extends Controller
{
  public function __construct()
  {
    $this->middleware("permission:Truy cập mục QL TT Ứng Viên|Truy cập mục QL TT Tuyển Dụng");
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $levels = EmploymentLevel::orderBy("id", "desc")->get();

    return view("admin.employment-level.index", compact("levels"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.employment-level.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:employment_levels,name"],
      "status" => ["required"]
    ]);

    $level = new EmploymentLevel();

    $level->name = $request->name;
    $level->slug = Str::slug($request->name);
    $level->status = $request->status;
    $level->save();

    flash()->addSuccess('Tạo mới cấp bậc việc làm thành công!', "Thành công");

    return redirect()->route("admin.employment-levels.index");
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
  public function edit(EmploymentLevel $employmentLevel)
  {
    return view("admin.employment-level.edit", compact("employmentLevel"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, EmploymentLevel $employmentLevel)
  {
    $request->validate([
      "name" => ["required", "unique:employment_levels,name," . $employmentLevel->id],
      "status" => ["required"]
    ]);

    $employmentLevel->name = $request->name;
    $employmentLevel->slug = Str::slug($request->name);
    $employmentLevel->status = $request->status;
    $employmentLevel->save();

    flash()->addSuccess('Cập nhật cấp bậc việc làm thành công!', "Thành công");

    return redirect()->route("admin.employment-levels.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $level = EmploymentLevel::findOrFail($id);
      $level->delete();

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
    $level = EmploymentLevel::findOrFail($request->id);
    $level->status = $request->status == "true" ? 1 : 0;
    $level->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

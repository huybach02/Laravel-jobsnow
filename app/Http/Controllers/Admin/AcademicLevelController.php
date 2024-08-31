<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcademicLevelController extends Controller
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
    $academicLevels = AcademicLevel::orderBy("id", "desc")->get();
    return view('admin.academic-level.index', compact('academicLevels'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.academic-level.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:academic_levels,name"],
      "status" => ["required"]
    ]);

    $academicLevel = new AcademicLevel();

    $academicLevel->name = $request->name;
    $academicLevel->slug = Str::slug($request->name);
    $academicLevel->status = $request->status;
    $academicLevel->save();

    flash()->addSuccess('Tạo mới trình độ học vấn thành công!', "Thành công");

    return redirect()->route("admin.academic-levels.index");
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
  public function edit(AcademicLevel $academicLevel)
  {
    return view('admin.academic-level.edit', compact('academicLevel'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, AcademicLevel $academicLevel)
  {
    $request->validate([
      "name" => ["required", "unique:academic_levels,name," . $academicLevel->id],
      "status" => ["required"]
    ]);

    $academicLevel->name = $request->name;
    $academicLevel->slug = Str::slug($request->name);
    $academicLevel->status = $request->status;
    $academicLevel->save();

    flash()->addSuccess('Cập nhật trình độ học vấn thành công!', "Thành công");

    return redirect()->route("admin.academic-levels.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $level = AcademicLevel::findOrFail($id);
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
    $level = AcademicLevel::findOrFail($request->id);
    $level->status = $request->status == "true" ? 1 : 0;
    $level->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

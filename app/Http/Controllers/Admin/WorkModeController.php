<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkMode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkModeController extends Controller
{
  public function __construct()
  {
    $this->middleware("permission:Truy cập mục QL TT Tuyển Dụng");
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $workModes = WorkMode::orderBy("id", "desc")->get();

    return view('admin.work-mode.index', compact('workModes'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.work-mode.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:work_modes,name"],
      "status" => ["required"]
    ]);

    $workMode = new WorkMode();

    $workMode->name = $request->name;
    $workMode->slug = Str::slug($request->name);
    $workMode->status = $request->status;
    $workMode->save();

    flash()->addSuccess('Tạo mới hình thức làm việc thành công!', "Thành công");

    return redirect()->route("admin.work-modes.index");
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
  public function edit(WorkMode $workMode)
  {
    return view('admin.work-mode.edit', compact('workMode'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, WorkMode $workMode)
  {
    $request->validate([
      "name" => ["required", "unique:work_modes,name," . $workMode->id],
      "status" => ["required"]
    ]);

    $workMode->name = $request->name;
    $workMode->slug = Str::slug($request->name);
    $workMode->status = $request->status;
    $workMode->save();

    flash()->addSuccess('Cập nhật hình thức làm việc thành công!', "Thành công");

    return redirect()->route("admin.work-modes.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $workMode = WorkMode::findOrFail($id);
      $workMode->delete();

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
    $workMode = WorkMode::findOrFail($request->id);
    $workMode->status = $request->status == "true" ? 1 : 0;
    $workMode->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DesiredSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DesiredSalaryController extends Controller
{
  public function __construct()
  {
    $this->middleware("permission:Truy cập mục QL TT Ứng Viên");
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $desiredSalaries = DesiredSalary::orderBy("id", "desc")->get();

    return view("admin.desired-salary.index", compact("desiredSalaries"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.desired-salary.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:desired_salaries,name"],
      "status" => ["required"]
    ]);

    $desiredSalary = new DesiredSalary();

    $desiredSalary->name = $request->name;
    $desiredSalary->slug = Str::slug($request->name);
    $desiredSalary->status = $request->status;
    $desiredSalary->save();

    flash()->addSuccess('Tạo mới mức lương mong muốn thành công!', "Thành công");

    return redirect()->route("admin.desired-salaries.index");
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
  public function edit(DesiredSalary $desiredSalary)
  {
    return view("admin.desired-salary.edit", compact("desiredSalary"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, DesiredSalary $desiredSalary)
  {
    $request->validate([
      "name" => ["required", "unique:desired_salaries,name," . $desiredSalary->id],
      "status" => ["required"]
    ]);

    $desiredSalary->name = $request->name;
    $desiredSalary->slug = Str::slug($request->name);
    $desiredSalary->status = $request->status;
    $desiredSalary->save();

    flash()->addSuccess('Cập nhật mức lương mong muốn thành công!', "Thành công");

    return redirect()->route("admin.desired-salaries.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $level = DesiredSalary::findOrFail($id);
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
    $level = DesiredSalary::findOrFail($request->id);
    $level->status = $request->status == "true" ? 1 : 0;
    $level->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

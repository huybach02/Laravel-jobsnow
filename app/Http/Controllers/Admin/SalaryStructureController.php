<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalaryStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SalaryStructureController extends Controller
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
    $salaryStructures = SalaryStructure::orderBy("id", "desc")->get();

    return view('admin.salary-structure.index', compact('salaryStructures'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.salary-structure.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:salary_structures,name"],
      "status" => ["required"]
    ]);

    $salaryStructure = new SalaryStructure();

    $salaryStructure->name = $request->name;
    $salaryStructure->slug = Str::slug($request->name);
    $salaryStructure->status = $request->status;
    $salaryStructure->save();

    flash()->addSuccess('Tạo mới hình thức trả lương thành công!', "Thành công");

    return redirect()->route("admin.salary-structures.index");
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
  public function edit(SalaryStructure $salaryStructure)
  {
    return view("admin.salary-structure.edit", compact("salaryStructure"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, SalaryStructure $salaryStructure)
  {
    $request->validate([
      "name" => ["required", "unique:salary_structures,name," . $salaryStructure->id],
      "status" => ["required"]
    ]);

    $salaryStructure->name = $request->name;
    $salaryStructure->slug = Str::slug($request->name);
    $salaryStructure->status = $request->status;
    $salaryStructure->save();

    flash()->addSuccess('Cập nhật hình thức trả lương thành công!', "Thành công");

    return redirect()->route("admin.salary-structures.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $salaryStructure = SalaryStructure::findOrFail($id);
      $salaryStructure->delete();

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
    $salaryStructure = SalaryStructure::findOrFail($request->id);
    $salaryStructure->status = $request->status == "true" ? 1 : 0;
    $salaryStructure->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

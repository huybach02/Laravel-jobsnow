<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobCategoryController extends Controller
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
    $jobCategories = JobCategory::orderBy("id", "desc")->get();

    return view("admin.job-category.index", compact("jobCategories"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.job-category.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:job_categories,name"],
      "status" => ["required"]
    ]);

    $jobCategory = new JobCategory();

    $jobCategory->name = $request->name;
    $jobCategory->slug = Str::slug($request->name);
    $jobCategory->status = $request->status;
    $jobCategory->save();

    flash()->addSuccess('Tạo mới danh mục tuyển dụng thành công!', "Thành công");

    return redirect()->route("admin.job-categories.index");
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
  public function edit(JobCategory $jobCategory)
  {
    return view("admin.job-category.edit", compact("jobCategory"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, JobCategory $jobCategory)
  {
    $request->validate([
      "name" => ["required", "unique:job_categories,name," . $jobCategory->id],
      "status" => ["required"]
    ]);

    $jobCategory->name = $request->name;
    $jobCategory->slug = Str::slug($request->name);
    $jobCategory->status = $request->status;
    $jobCategory->save();

    flash()->addSuccess('Cập nhật danh mục tuyển dụng thành công!', "Thành công");

    return redirect()->route("admin.job-categories.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $jobCategory = JobCategory::findOrFail($id);
      $jobCategory->delete();

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
    $jobCategory = JobCategory::findOrFail($request->id);
    $jobCategory->status = $request->status == "true" ? 1 : 0;
    $jobCategory->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

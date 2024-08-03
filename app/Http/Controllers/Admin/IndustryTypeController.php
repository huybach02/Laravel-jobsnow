<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryType;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryTypeController extends Controller
{
  // use Searchable;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // $query = IndustryType::query();
    // $this->search($query, "name", request("search"));
    // $industryTypes = $query->latest()->paginate(10);

    $industryTypes = IndustryType::latest()->get();

    return view("admin.industry-type.index", compact("industryTypes"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.industry-type.create");
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

    $industry_type = new IndustryType();

    $industry_type->name = $request->name;
    $industry_type->slug = Str::slug($request->name);
    $industry_type->status = $request->status;
    $industry_type->save();

    flash()->addSuccess('Tạo mới lĩnh vực hoạt động thành công!', "Thành công");

    return redirect()->route("admin.industry-types.index");
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
  public function edit(IndustryType $industryType)
  {
    return view("admin.industry-type.edit", compact("industryType"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, IndustryType $industryType)
  {
    $request->validate([
      "name" => ["required", "unique:industry_types,name," . $industryType->id],
      "status" => ["required"]
    ]);

    $industryType->name = $request->name;
    $industryType->slug = Str::slug($request->name);
    $industryType->status = $request->status;
    $industryType->save();

    flash()->addSuccess('Chỉnh sửa lĩnh vực hoạt động thành công!', "Thành công");

    return redirect()->route("admin.industry-types.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $industryType = IndustryType::findOrFail($id);
      $industryType->delete();

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
    $industryType = IndustryType::findOrFail($request->id);
    $industryType->status = $request->status == "true" ? 1 : 0;
    $industryType->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

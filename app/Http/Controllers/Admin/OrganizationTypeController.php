<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrganizationTypeController extends Controller
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
    $organizationTypes = OrganizationType::latest()->get();

    return view("admin.organization-type.index", compact("organizationTypes"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.organization-type.create");
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

    $organizationType = new OrganizationType();

    $organizationType->name = $request->name;
    $organizationType->slug = Str::slug($request->name);
    $organizationType->status = $request->status;
    $organizationType->save();

    flash()->addSuccess('Tạo mới loại hình tổ chức thành công!', "Thành công");

    return redirect()->route("admin.organization-types.index");
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
  public function edit(OrganizationType $organizationType)
  {
    return view("admin.organization-type.edit", compact("organizationType"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, OrganizationType $organizationType)
  {
    $request->validate([
      "name" => ["required", "unique:industry_types,name"],
      "status" => ["required"]
    ]);

    $organizationType->name = $request->name;
    $organizationType->slug = Str::slug($request->name);
    $organizationType->status = $request->status;
    $organizationType->save();

    flash()->addSuccess('Cập nhật loại hình tổ chức thành công!', "Thành công");

    return redirect()->route("admin.organization-types.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $organizationType = OrganizationType::findOrFail($id);
      $organizationType->delete();

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
    $organization_type = OrganizationType::findOrFail($request->id);
    $organization_type->status = $request->status == "true" ? 1 : 0;
    $organization_type->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
  public function __construct()
  {
    $this->middleware("permission:Truy cập mục QL Người Dùng");
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::orderBy("id", "desc")->get();

    return view("admin.user-manage.role.index", compact("roles"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $permissions = Permission::get()->groupBy("group");

    return view("admin.user-manage.role.create", compact('permissions'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
    ]);

    $role = Role::create([
      'name' => $request->name,
      'guard_name' => 'admin',
    ]);

    $role->syncPermissions($request->permissions);

    flash()->addSuccess('Tạo mới vai trò người dùng thành công!', "Thành công");

    return redirect()->route("admin.roles.index");
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
  public function edit(Role $role)
  {
    if ($role->name == "Quản trị viên hệ thống") {
      flash()->addWarning('Không thể chỉnh sửa vai trò này!', "Thông bảo");

      return redirect()->route("admin.roles.index");
    }

    $permissions = Permission::get()->groupBy("group");
    $rolePermissions = $role->permissions;
    $rolePermissions = $rolePermissions->pluck("name")->toArray();

    return view("admin.user-manage.role.edit", compact('role', 'permissions', 'rolePermissions'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Role $role)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id],
    ]);

    $role->update([
      'name' => $request->name,
      'guard_name' => 'admin',
    ]);

    $role->syncPermissions($request->permissions);

    flash()->addSuccess('Tạo mới vai trò người dùng thành công!', "Thành công");

    return redirect()->route("admin.roles.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $role = Role::findOrFail($id);

    if ($role->name == "Quản trị viên hệ thống") {
      return response([
        "success" => false,
      ]);
    }

    try {
      $role->delete();

      return response([
        "success" => true,
      ]);
    } catch (\Exception $e) {
      return response([
        "success" => false,
      ]);
    }
  }
}

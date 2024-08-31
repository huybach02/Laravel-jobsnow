<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
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
    $admins = Admin::orderBy("id", "desc")->get();

    return view("admin.user-manage.role-user.index", compact("admins"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $roles = Role::orderBy("id", "desc")->get();

    return view("admin.user-manage.role-user.create", compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255', 'unique:admins,name'],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:admins,email'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'password_confirmation' => ['required'],
      'role' => ["required"]
    ]);

    $admin = new Admin();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->password = bcrypt($request->password);
    $admin->save();

    $admin->assignRole($request->role);

    flash()->addSuccess('Tạo mới người dùng thành công!', "Thành công");

    return redirect()->route("admin.role-user.index");
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
  public function edit($id)
  {
    $admin = Admin::findOrFail($id);
    $roles = Role::orderBy("id", "desc")->get();

    return view("admin.user-manage.role-user.edit", compact("admin", "roles"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255', 'unique:admins,name,' . $id],
      'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:admins,email,' . $id],
      'password' => ['nullable', 'string', 'min:8', 'confirmed'],
      'password_confirmation' => ['nullable'],
      'role' => ["required"]
    ]);

    $admin = Admin::findOrFail($id);
    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->password) {
      $admin->password = bcrypt($request->password);
    }

    $admin->save();

    $admin->syncRoles($request->role);

    flash()->addSuccess('Cập nhật người dùng thành công!', "Thành công");

    return redirect()->route("admin.role-user.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $admin = Admin::findOrFail($id);

    if ($admin->getRoleNames()->first() == "Quản trị viên hệ thống") {
      return response([
        "success" => false,
      ]);
    }

    try {
      $admin->delete();

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

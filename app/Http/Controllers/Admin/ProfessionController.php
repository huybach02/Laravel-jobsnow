<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfessionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $professions = Profession::orderBy("id", "desc")->get();
    return view("admin.profession.index", compact("professions"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.profession.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:professions,name"],
      "status" => ["required"]
    ]);

    $profession = new Profession();

    $profession->name = $request->name;
    $profession->slug = Str::slug($request->name);
    $profession->status = $request->status;
    $profession->save();

    flash()->addSuccess('Tạo mới lĩnh vực nghề nghiệp thành công!', "Thành công");

    return redirect()->route("admin.professions.index");
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
  public function edit(Profession $profession)
  {
    return view("admin.profession.edit", compact("profession"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Profession $profession)
  {
    $request->validate([
      "name" => ["required", "unique:professions,name," . $profession->id],
      "status" => ["required"]
    ]);

    $profession->name = $request->name;
    $profession->slug = Str::slug($request->name);
    $profession->status = $request->status;
    $profession->save();

    flash()->addSuccess('Cập nhật lĩnh vực nghề nghiệp thành công!', "Thành công");

    return redirect()->route("admin.professions.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $profession = Profession::findOrFail($id);
      $profession->delete();

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
    $profession = Profession::findOrFail($request->id);
    $profession->status = $request->status == "true" ? 1 : 0;
    $profession->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

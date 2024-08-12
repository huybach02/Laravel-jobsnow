<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoftSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoftSkillController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $softSkills = SoftSkill::latest()->get();
    return view("admin.soft-skill.index", compact("softSkills"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.soft-skill.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:soft_skills,name"],
      "status" => ["required"]
    ]);

    $softSkill = new SoftSkill();

    $softSkill->name = $request->name;
    $softSkill->slug = Str::slug($request->name);
    $softSkill->status = $request->status;
    $softSkill->save();

    flash()->addSuccess('Tạo mới kỹ năng mềm thành công!', "Thành công");

    return redirect()->route("admin.soft-skills.index");
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
  public function edit(SoftSkill $softSkill)
  {
    return view("admin.soft-skill.edit", compact("softSkill"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, SoftSkill $softSkill)
  {
    $request->validate([
      "name" => ["required", "unique:soft_skills,name"],
      "status" => ["required"]
    ]);

    $softSkill->name = $request->name;
    $softSkill->slug = Str::slug($request->name);
    $softSkill->status = $request->status;
    $softSkill->save();

    flash()->addSuccess('Cập nhật kỹ năng mềm thành công!', "Thành công");

    return redirect()->route("admin.soft-skills.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $softSkill = SoftSkill::findOrFail($id);
      $softSkill->delete();

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
    $softSkill = SoftSkill::findOrFail($request->id);
    $softSkill->status = $request->status == "true" ? 1 : 0;
    $softSkill->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

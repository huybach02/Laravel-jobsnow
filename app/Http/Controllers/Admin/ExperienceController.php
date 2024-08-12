<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExperienceController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $experiences = Experience::orderBy("id", "desc")->get();
    return view("admin.experience.index", compact("experiences"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.experience.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:experiences,name"],
      "status" => ["required"]
    ]);

    $experience = new Experience();

    $experience->name = $request->name;
    $experience->slug = Str::slug($request->name);
    $experience->status = $request->status;
    $experience->save();

    flash()->addSuccess('Tạo mới kinh nghiệm làm việc thành công!', "Thành công");

    return redirect()->route("admin.experiences.index");
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
  public function edit(Experience $experience)
  {
    return view("admin.experience.edit", compact("experience"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Experience $experience)
  {
    $request->validate([
      "name" => ["required", "unique:experiences,name," . $experience->id],
      "status" => ["required"]
    ]);

    $experience->name = $request->name;
    $experience->slug = Str::slug($request->name);
    $experience->status = $request->status;
    $experience->save();

    flash()->addSuccess('Cập nhật kinh nghiệm làm việc thành công!', "Thành công");

    return redirect()->route("admin.experiences.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $experience = Experience::findOrFail($id);
      $experience->delete();

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
    $experience = Experience::findOrFail($request->id);
    $experience->status = $request->status == "true" ? 1 : 0;
    $experience->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

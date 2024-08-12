<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LanguageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $languages = Language::latest()->get();

    return view("admin.language.index", compact("languages"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.language.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "name" => ["required", "unique:languages,name"],
      "status" => ["required"]
    ]);

    $language = new Language();

    $language->name = $request->name;
    $language->slug = Str::slug($request->name);
    $language->status = $request->status;
    $language->save();

    flash()->addSuccess('Tạo mới ngôn ngữ thành thạo thành công!', "Thành công");

    return redirect()->route("admin.languages.index");
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
  public function edit(Language $language)
  {
    return view("admin.language.edit", compact("language"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Language $language)
  {
    $request->validate([
      "name" => ["required", "unique:languages,name," . $language->id],
      "status" => ["required"]
    ]);

    $language->name = $request->name;
    $language->slug = Str::slug($request->name);
    $language->status = $request->status;
    $language->save();

    flash()->addSuccess('Cập nhật ngôn ngữ thành thạo thành công!', "Thành công");

    return redirect()->route("admin.languages.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $language = Language::findOrFail($id);
      $language->delete();

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
    $language = Language::findOrFail($request->id);
    $language->status = $request->status == "true" ? 1 : 0;
    $language->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

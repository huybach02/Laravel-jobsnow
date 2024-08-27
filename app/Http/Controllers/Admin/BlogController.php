<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
  use FileUploadTrait;

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $blogs = Blog::orderBy("id", "desc")->get();

    return view("admin.blog.index", compact("blogs"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.blog.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "image" => ["required", "image", "max:10000"],
      "title" => "required",
      "description" => "required",
      "status" => "required"
    ]);

    $imagePath = $this->uploadFile($request, "image", "uploads/blogs");

    $blog = new Blog();
    $blog->image = $imagePath;
    $blog->title = $request->title;
    $blog->slug = Str::slug($request->title) . "-" . time();
    $blog->description = $request->description;
    $blog->status = $request->status;
    $blog->save();

    flash()->addSuccess('Tạo mới tin tức thành công!', "Thành công");

    return redirect()->route("admin.blogs.index");
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
  public function edit(Blog $blog)
  {
    return view("admin.blog.edit", compact("blog"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Blog $blog)
  {
    $request->validate([
      "image" => ["nullable", "image", "max:10000"],
      "title" => "required",
      "description" => "required",
      "status" => "required"
    ]);

    if ($request->hasFile("image")) {
      $imagePath = $this->uploadFile($request, "image", "uploads/blogs", $blog->image);
    } else {
      $imagePath = $blog->image;
    }

    $blog->image = $imagePath;
    $blog->title = $request->title;
    $blog->slug = Str::slug($request->title) . "-" . time();
    $blog->description = $request->description;
    $blog->status = $request->status;
    $blog->save();

    flash()->addSuccess('Cập nhật tin tức thành công!', "Thành công");

    return redirect()->route("admin.blogs.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $blog = Blog::findOrFail($id);
      $blog->delete();

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
    $blog = Blog::findOrFail($request->id);
    $blog->status = $request->status == "true" ? 1 : 0;
    $blog->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

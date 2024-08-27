<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  public function index()
  {
    $blogs = Blog::where("status", 1)->orderBy("id", "desc")->get();

    return view("frontend.pages.blogs-index", compact("blogs"));
  }

  public function show($slug)
  {
    $blog = Blog::where(["slug" => $slug, "status" => 1])->first();

    if (!$blog) {
      abort(404);
    }

    return view("frontend.pages.blogs-show", compact("blog"));
  }
}

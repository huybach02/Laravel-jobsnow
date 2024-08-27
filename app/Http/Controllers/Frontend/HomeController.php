<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $plans = Plan::where(["status" => 1])->orderBy("price", "asc")->get();
    $blogs = Blog::where(["status" => 1])->orderBy("id", "desc")->limit(10)->get();

    return view('frontend.home.index', compact("plans", "blogs"));
  }
}

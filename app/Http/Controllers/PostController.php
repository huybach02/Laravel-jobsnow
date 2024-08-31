<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware("permission:Truy cập mục QL Tin Tuyển Dụng");
  }

  public function index()
  {
    $jobs = Job::withCount("applications")->orderBy("id", "desc")->get();

    return view('admin.post.index', compact('jobs'));
  }

  public function changeStatus(Request $request)
  {
    $job = Job::findOrFail($request->id);
    $job->is_blocked = $request->value == "1" ? 1 : 0;
    $job->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }
}

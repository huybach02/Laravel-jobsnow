<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobBookmark;
use Illuminate\Http\Request;

class CandidateJobBookmarkController extends Controller
{
  public function index()
  {
    $bookmarks = JobBookmark::where('candidate_id', auth()->user()->candidate->id)->orderBy('id', 'desc')->get();

    return view('frontend.candidate-dashboard.bookmark.index', compact('bookmarks'));
  }

  public function store($id)
  {
    if (!auth()->check()) {
      return response([
        'success' => false,
        'message' => 'Vui lòng đăng nhập để đánh dấu tin tuyển dụng!',
      ]);
    }

    $checkBookmark = JobBookmark::where('job_id', $id)->where('candidate_id', auth()->user()->candidate->id)->first();

    if ($checkBookmark) {
      return response([
        'success' => false,
        'message' => 'Tin tuyển dụng đã đánh dấu!',
      ]);
    }

    $bookmark = new JobBookmark();
    $bookmark->job_id = $id;
    $bookmark->candidate_id = auth()->user()->candidate->id;
    $bookmark->save();

    return response([
      'success' => true,
      'message' => 'Đánh dấu tin tuyển dụng thành công!',
    ]);
  }
}

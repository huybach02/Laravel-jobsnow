<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use Illuminate\Http\Request;

class CandidateMyJobAppliedController extends Controller
{
  public function index()
  {
    $myJobs = AppliedJob::with("job", "candidate")->where("candidate_id", auth()->user()->candidate->id)->orderBy("id", "desc")->get();

    return view("frontend.candidate-dashboard.my-jobs-applied.index", compact("myJobs"));
  }

  public function show(Request $request, $id)
  {
    $myJob = AppliedJob::with("job", "candidate")->where("id", $id)->where("candidate_id", auth()->user()->candidate->id)->first();
    $candidate = $myJob->candidate;

    if ($request->ajax()) {
      $html = view('frontend.candidate-dashboard.my-jobs-applied.my-jobs-modal', compact('myJob', 'candidate'))->render();

      return response()->json($html);
    }
  }
}

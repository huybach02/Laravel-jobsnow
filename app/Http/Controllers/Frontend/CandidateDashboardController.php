<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Models\JobBookmark;
use Illuminate\Http\Request;

class CandidateDashboardController extends Controller
{
  public function index()
  {
    $candidateInfo = Candidate::where('user_id', auth()->user()->id)->first();
    $jobCount = AppliedJob::where('candidate_id', $candidateInfo->id)->count();
    $jobAcceptedCount = AppliedJob::where('candidate_id', $candidateInfo->id)->where('status', "accepted")->count();
    $jobBookmarkCount = JobBookmark::where('candidate_id', $candidateInfo->id)->count();

    return view('frontend.candidate-dashboard.dashboard', compact('candidateInfo', 'jobCount', 'jobAcceptedCount', 'jobBookmarkCount'));
  }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateWork;
use Illuminate\Http\Request;

class FrontendCandidateController extends Controller
{
  public function index()
  {
    $candidates = Candidate::where(["profile_completed" => 1, "status" => 1, "allow_show" => 1])->latest()->get();

    return view('frontend.pages.candidate-index', compact('candidates'));
  }

  public function show($slug)
  {
    $candidate = Candidate::where(["slug" => $slug, "profile_completed" => 1, "status" => 1, "allow_show" => 1])->first();

    $educations = CandidateEducation::where("candidate_id", $candidate->id)->orderBy("id", "asc")->get();
    $works = CandidateWork::where("candidate_id", $candidate->id)->orderBy("id", "asc")->get();

    if ($candidate) {
      return view('frontend.pages.candidate-show', compact('candidate', 'educations', 'works'));
    }

    abort(404);
  }
}

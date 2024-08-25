<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateWork;
use App\Models\AcademicLevel;
use App\Models\DesiredSalary;
use App\Models\EmploymentLevel;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Profession;
use App\Models\ProvinceCity;
use App\Models\WorkMode;
use Illuminate\Http\Request;

class FrontendCandidateController extends Controller
{
  public function index(Request $request)
  {
    $provinces = ProvinceCity::all();
    $jobCategories = Profession::all();
    $employmentLevels = EmploymentLevel::withCount([
      "candidates" => function ($query) {
        $query->where(["status" => 1, "profile_completed" => 1, "allow_show" => 1]);
      }
    ])->get();
    $desiredSalaries = DesiredSalary::all();
    $experiences = Experience::withCount([
      "candidates" => function ($query) {
        $query->where(["status" => 1, "profile_completed" => 1, "allow_show" => 1]);
      }
    ])->get();
    $academicLevels = AcademicLevel::withCount([
      "candidates" => function ($query) {
        $query->where(["status" => 1, "profile_completed" => 1, "allow_show" => 1]);
      }
    ])->get();

    $query = Candidate::query();
    $query = Candidate::where(["status" => 1, "profile_completed" => 1, "allow_show" => 1]);

    if ($request->has("search") && $request->search != "") {
      $query->where('full_name', 'like', '%' . $request->search . '%');
    }
    if ($request->has("province") && $request->province != "00") {
      $query->where("province", $request->province);
    }
    if ($request->has("category") && $request->category != "all") {
      $query->where('profession_id', $request->category);
    }
    if ($request->has('employment_levels') && !empty($request->employment_levels)) {
      $query->whereIn('employment_level_id', $request->employment_levels);
    }
    if ($request->has('experiences') && !empty($request->experiences)) {
      $query->whereIn('experience_id', $request->experiences);
    }
    if ($request->has('academic_levels') && !empty($request->academic_levels)) {
      $query->whereIn('academic_level_id', $request->academic_levels);
    }

    $limit = $request->limit ?? 10;

    if ($request->has("sort") && $request->sort == "latest") {
      $query->orderBy("created_at", "desc");
    } elseif ($request->has("sort") && $request->sort == "oldest") {
      $query->orderBy("created_at", "asc");
    } else {
      $query->orderBy("created_at", "desc");
    }

    $candidates = $query->paginate($limit);

    if ($request->ajax()) {
      $html = view('frontend.pages.components.candidate-list', compact('candidates'))->render();

      return response()->json($html);
    }

    return view('frontend.pages.candidate-index', compact('candidates', 'provinces', 'jobCategories', 'employmentLevels', 'desiredSalaries', 'experiences', 'academicLevels'));
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

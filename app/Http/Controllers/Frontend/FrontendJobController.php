<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AcademicLevel;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Models\DesiredSalary;
use App\Models\EmploymentLevel;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ProvinceCity;
use App\Models\WorkMode;
use Illuminate\Http\Request;

class FrontendJobController extends Controller
{
  public function index(Request $request)
  {
    $provinces = ProvinceCity::all();
    $jobCategories = JobCategory::all();
    $employmentLevels = EmploymentLevel::withCount([
      "jobs" => function ($query) {
        $query->where(["status" => 1])->where("deadline", ">=", date("Y-m-d"));
      }
    ])->get();
    $desiredSalaries = DesiredSalary::all();
    $workModes = WorkMode::withCount([
      "jobs" => function ($query) {
        $query->where(["status" => 1])->where("deadline", ">=", date("Y-m-d"));
      }
    ])->get();
    $experiences = Experience::withCount([
      "jobs" => function ($query) {
        $query->where(["status" => 1])->where("deadline", ">=", date("Y-m-d"));
      }
    ])->get();
    $academicLevels = AcademicLevel::withCount([
      "jobs" => function ($query) {
        $query->where(["status" => 1])->where("deadline", ">=", date("Y-m-d"));
      }
    ])->get();

    $query = Job::query();
    $query = Job::where(["status" => 1])->where("deadline", ">=", date("Y-m-d"));

    if ($request->has("search") && $request->search != "") {
      $query->where('title', 'like', '%' . $request->search . '%');
    }
    if ($request->has("province") && $request->province != "00") {
      $query->where("province", $request->province);
    }
    if ($request->has("category") && $request->category != "all") {
      $query->where('job_category', 'like', '%' . $request->category . '%');
    }
    if ($request->has('employment_levels') && !empty($request->employment_levels)) {
      $query->whereIn('employment_level', $request->employment_levels);
    }
    if ($request->has('work_modes') && !empty($request->work_modes)) {
      $query->whereIn('work_mode', $request->work_modes);
    }
    if ($request->has('experiences') && !empty($request->experiences)) {
      $query->whereIn('experience', $request->experiences);
    }
    if ($request->has('academic_levels') && !empty($request->academic_levels)) {
      $query->whereIn('academic_level', $request->academic_levels);
    }
    if ($request->has('min_value') && $request->min_value != "") {
      $query->where('salary_min', ">=", $request->min_value);
    }

    $limit = $request->limit ?? 10;

    if ($request->has("sort") && $request->sort == "latest") {
      $query->orderBy("created_at", "desc");
    } elseif ($request->has("sort") && $request->sort == "oldest") {
      $query->orderBy("created_at", "asc");
    } else {
      $query->orderBy("created_at", "desc");
    }

    $jobs = $query->paginate($limit);

    if ($request->ajax()) {
      $html = view('frontend.pages.components.jobs-list', compact('jobs'))->render();

      return response()->json($html);
    }

    return view('frontend.pages.jobs-index', compact('jobs', 'provinces', 'jobCategories', 'employmentLevels', 'desiredSalaries', 'workModes', 'experiences', 'academicLevels'));
  }

  public function show($slug)
  {
    $job = Job::where(["status" => 1])->where("slug", $slug)->first();
    $similarJobs = Job::where(["status" => 1])->where("slug", "!=", $slug)->where("deadline", ">=", date("Y-m-d"))->where("company_id", $job->company_id)->get();
    $countJobByCompany = Job::where(["status" => 1])->where("deadline", ">=", date("Y-m-d"))->where("company_id", $job->company_id)->count();
    $candidate = auth()->check() ? Candidate::where('user_id', auth()->user()->id)->first() : null;

    if (!$job) {
      abort(404);
    }

    return view('frontend.pages.jobs-show', compact('job', 'similarJobs', 'countJobByCompany', 'candidate'));
  }

  public function applyJob(Request $request, $id)
  {
    $appliedJob = new AppliedJob();
    $appliedJob->job_id = $id;
    $appliedJob->candidate_id = auth()->user()->candidate->id;
    $appliedJob->message = $request->message;
    $appliedJob->save();

    flash()->addSuccess('Đã ứng tuyển thành công!', "Thành công");

    return redirect()->back();
  }
}

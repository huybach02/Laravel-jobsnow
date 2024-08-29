<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\HeroSection;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Plan;
use App\Models\ProvinceCity;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $plans = Plan::where(["status" => 1])->orderBy("price", "asc")->get();
    $blogs = Blog::where(["status" => 1])->orderBy("id", "desc")->limit(10)->get();
    $hero = HeroSection::first();
    $jobCategories = JobCategory::where('is_featured', 1)->get();
    $jobFeaturedCategories = JobCategory::where('is_job_featured', 1)->take(10)->get();
    $jobCount = Job::where(["status" => 1])->where("deadline", ">=", date("Y-m-d"))->count();
    $companyCount = Company::where(["status" => 1, "profile_completed" => 1])->count();
    $candidateCount = Candidate::where(["status" => 1, "profile_completed" => 1])->count();
    $jobCategoryCount = JobCategory::where(["status" => 1])->count();
    $featuredCompanies = Company::withCount("jobs")->where(["status" => 1, "profile_completed" => 1])->where("visibility", 1)->get();
    $provinces = ProvinceCity::withCount("jobs")->get();

    foreach ($jobCategories as $category) {
      $category->jobs_count = DB::table('jobs')
        ->where(["status" => 1])->where("deadline", ">=", date("Y-m-d"))
        ->whereRaw("FIND_IN_SET(?, jobs.job_category)", [$category->id])
        ->count();
    }

    return view('frontend.home.index', compact("plans", "blogs", "hero", "jobCategories", "jobFeaturedCategories", "jobCount", "companyCount", "candidateCount", "jobCategoryCount", "featuredCompanies", "provinces"));
  }

  public function fetchJobs(Request $request, $categoryId)
  {
    $jobs = Job::whereRaw("FIND_IN_SET(?, job_category)", [$categoryId])->where("deadline", ">=", date("Y-m-d"))->where("is_featured", 1)->where("status", 1)->inRandomOrder()->take(12)->get();

    if ($request->ajax()) {
      $html = view('frontend.home.featured-job-list', compact('jobs'))->render();

      return response()->json($html);
    }
  }
}

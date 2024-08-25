<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\IndustryType;
use App\Models\Job;
use App\Models\ProvinceCity;
use Illuminate\Http\Request;

class FrontendCompanyController extends Controller
{
  public function index(Request $request)
  {
    $provinces = ProvinceCity::all();
    $jobCategories = IndustryType::all();

    $query = Company::query();
    $query = Company::where(["status" => 1, "profile_completed" => 1]);

    if ($request->has("search") && $request->search != "") {
      $query->where('name', 'like', '%' . $request->search . '%');
    }
    if ($request->has("province") && $request->province != "00") {
      $query->where("province", $request->province);
    }
    if ($request->has("category") && $request->category != "all") {
      $query->where('industry_type_id', $request->category);
    }

    $limit = $request->limit ?? 10;

    if ($request->has("sort") && $request->sort == "latest") {
      $query->orderBy("created_at", "desc");
    } elseif ($request->has("sort") && $request->sort == "oldest") {
      $query->orderBy("created_at", "asc");
    } else {
      $query->orderBy("created_at", "desc");
    }

    $companies = $query->paginate($limit);

    if ($request->ajax()) {
      $html = view('frontend.pages.components.company-list', compact('companies'))->render();

      return response()->json($html);
    }

    return view('frontend.pages.company-index', compact('companies', 'provinces', 'jobCategories'));
  }

  public function show($slug)
  {
    $company = Company::where(["slug" => $slug, "profile_completed" => 1, "status" => 1])->first();
    $jobs = Job::where(["status" => 1])->where("deadline", ">=", date("Y-m-d"))->where("company_id", $company->id)->paginate(10);

    if (!$company) {
      abort(404);
    }

    return view('frontend.pages.company-show', compact('company', 'jobs'));
  }
}

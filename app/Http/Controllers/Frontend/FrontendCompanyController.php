<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class FrontendCompanyController extends Controller
{
  public function index()
  {
    $companies = Company::where(["profile_completed" => 1, "status" => 1])->latest()->get();

    return view('frontend.pages.company-index', compact('companies'));
  }

  public function show($slug)
  {
    $company = Company::where(["slug" => $slug, "profile_completed" => 1, "status" => 1])->first();

    if (!$company) {
      abort(404);
    }

    return view('frontend.pages.company-show', compact('company'));
  }
}

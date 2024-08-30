<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class CompanyDashboardController extends Controller
{
  public function index()
  {
    $companyInfo = Company::where('user_id', auth()->user()->id)->first();

    return view('frontend.company-dashboard.dashboard', compact('companyInfo'));
  }
}

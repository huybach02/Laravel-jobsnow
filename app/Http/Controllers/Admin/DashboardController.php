<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
  public function index(Request $request)
  {
    $selectedYear = $request->input('year', date('Y')); // Mặc định là năm hiện tại

    $jobCount = Job::count();
    $companyCount = Company::count();
    $candidateCount = Candidate::count();
    $jobCategoryCount = JobCategory::count();
    $blogCount = Blog::count();

    $monthlyEarnings = Order::selectRaw('MONTH(created_at) as month, SUM(price) as total')
      ->whereYear('created_at', $selectedYear)
      ->where('status', 'paid')
      ->groupBy('month')
      ->pluck('total', 'month')
      ->toArray();
    $todayRevenue = Order::whereDate('created_at', Carbon::today())
      ->sum('price');

    $monthlyJobCount = Job::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
      ->whereYear('created_at', $selectedYear)
      ->groupBy('month')
      ->pluck('total', 'month')
      ->toArray();

    return view('admin.dashboard.index', compact('jobCount', 'companyCount', 'candidateCount', 'jobCategoryCount', 'blogCount', 'monthlyEarnings', 'monthlyJobCount', 'todayRevenue'));
  }
}

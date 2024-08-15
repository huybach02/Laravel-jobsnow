<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $plans = Plan::orderBy("price", "asc")->get();

    return view("admin.plan.index", compact("plans"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("admin.plan.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "label" => ["required"],
      "price" => ["required"],
      "job_count" => ["required"],
      "featured_job_count" => ["required"],
      "company_featured_show" => ["required"],
      "company_verified_show" => ["required"],
      "recommended" => ["required"],
      "status" => ["required"]
    ]);

    $plan = new Plan();
    $plan->label = $request->label;
    $plan->price = $request->price;
    $plan->job_count = $request->job_count;
    $plan->featured_job_count = $request->featured_job_count;
    $plan->company_featured_show = $request->company_featured_show;
    $plan->company_verified_show = $request->company_verified_show;
    $plan->recommended = $request->recommended;
    $plan->status = $request->status;
    $plan->save();

    flash()->addSuccess('Tạo mới gói dịch vụ thành công!', "Thành công");

    return redirect()->route("admin.plans.index");
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Plan $plan)
  {
    return view("admin.plan.edit", compact("plan"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Plan $plan)
  {
    $request->validate([
      "label" => ["required"],
      "price" => ["required"],
      "job_count" => ["required"],
      "featured_job_count" => ["required"],
      "company_featured_show" => ["required"],
      "company_verified_show" => ["required"],
      "recommended" => ["required"],
      "status" => ["required"]
    ]);

    $plan->label = $request->label;
    $plan->price = $request->price;
    $plan->job_count = $request->job_count;
    $plan->featured_job_count = $request->featured_job_count;
    $plan->company_featured_show = $request->company_featured_show;
    $plan->company_verified_show = $request->company_verified_show;
    $plan->recommended = $request->recommended;
    $plan->status = $request->status;
    $plan->save();

    flash()->addSuccess('Cập nhật gói dịch vụ thành công!', "Thành công");

    return redirect()->route("admin.plans.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $plan = Plan::findOrFail($id);
      $plan->delete();

      return response([
        "success" => true,
      ]);
    } catch (\Exception $e) {
      return response([
        "success" => false,
      ]);
    }
  }
}

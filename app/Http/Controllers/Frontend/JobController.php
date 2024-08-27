<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\AcademicLevel;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Models\CommuneWard;
use App\Models\Company;
use App\Models\District;
use App\Models\EmploymentLevel;
use App\Models\Experience;
use App\Models\FeaturedPost;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Language;
use App\Models\ProvinceCity;
use App\Models\SalaryStructure;
use App\Models\SoftSkill;
use App\Models\WorkMode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $jobs = Job::withCount("applications")->orderBy("id", "desc")->get();

    return view('frontend.company-dashboard.job.index', compact('jobs'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $company = Company::find(auth()->user()->company->id);

    if ($company->used_post == $company->limit_post) {
      flash()->addError('Bạn đã sử dụng hết số lượng bài tuyển dụng tối đa!', "Cảnh báo");

      return redirect()->route('company.jobs.index');
    }

    $jobCategories = JobCategory::all();
    $employmentLevels = EmploymentLevel::all();
    $salaryStructures = SalaryStructure::all();
    $experiences = Experience::all();
    $academicLevels = AcademicLevel::all();
    $workModes = WorkMode::all();
    $provinces = ProvinceCity::all();
    $districts = District::all();
    $wards = CommuneWard::all();
    $softSkills = SoftSkill::all();
    $languages = Language::all();

    return view('frontend.company-dashboard.job.create', compact('jobCategories', 'employmentLevels', 'salaryStructures', 'experiences', 'academicLevels', 'workModes', 'provinces', 'districts', 'wards', 'softSkills', 'languages'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(JobRequest $request)
  {
    $jobCategories = implode(",", $request->job_category);
    $softSkills = implode(",", $request->soft_skills);
    $languageNames = Language::whereIn('id', $request->foreign_languages)->pluck('name')->toArray();
    $foreignLanguages = implode(",", $languageNames);

    $job = new Job();

    $job->title = $request->title;
    $job->slug = Str::slug($request->title) . "-" . Str::random(5);
    $job->company_id = auth()->user()->company->id;
    $job->job_category = $jobCategories;
    $job->employment_level = $request->employment_level;
    $job->salary_structure = $request->salary_structure;
    $job->salary_min = $request->salary_min;
    $job->salary_max = $request->salary_max;
    $job->deadline = $request->deadline;
    $job->experience = $request->experience;
    $job->academic_level = $request->academic_level;
    $job->gender = $request->gender;
    $job->quantity = $request->quantity;
    $job->work_mode = $request->work_mode;
    $job->province = $request->province;
    $job->district = $request->district;
    $job->ward = $request->ward;
    $job->address = $request->address;
    $job->description = $request->description;
    $job->requirement = $request->requirement;
    $job->advanced_skills = $request->advanced_skills;
    $job->soft_skills = $softSkills;
    $job->foreign_languages = $foreignLanguages;
    $job->benefits = $request->benefits;
    $job->request_to_apply = $request->request_to_apply;
    $job->contact_person = $request->contact_person;
    $job->contact_email = $request->contact_email;
    $job->contact_phone = $request->contact_phone;
    $job->save();

    $company = Company::find(auth()->user()->company->id);
    $company->used_post = $company->used_post + 1;
    $company->save();

    flash()->addSuccess('Tạo mới tin tuyển dụng thành công!', "Thành công");

    return redirect()->route("company.jobs.index");
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
  public function edit(Job $job)
  {
    $jobCategories = JobCategory::all();
    $employmentLevels = EmploymentLevel::all();
    $salaryStructures = SalaryStructure::all();
    $experiences = Experience::all();
    $academicLevels = AcademicLevel::all();
    $workModes = WorkMode::all();
    $provinces = ProvinceCity::all();
    $softSkills = SoftSkill::all();
    $languages = Language::all();

    $districts = [];
    $wards = [];

    if ($job) {
      $districts = District::select("code", "name", "code_name")->where(["province_code" => $job->province])->get();
      $wards = CommuneWard::select("code", "name", "code_name")->where(["district_code" => $job->district])->get();
    }

    return view('frontend.company-dashboard.job.edit', compact('job', 'jobCategories', 'employmentLevels', 'salaryStructures', 'experiences', 'academicLevels', 'workModes', 'provinces', 'districts', 'wards', 'softSkills', 'languages'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Job $job)
  {
    $jobCategories = implode(",", $request->job_category);
    $softSkills = implode(",", $request->soft_skills);
    $languageNames = Language::whereIn('id', $request->foreign_languages)->pluck('name')->toArray();
    $foreignLanguages = count($languageNames) == 0 ? "Không yêu cầu ngoại ngữ" : implode(",", $languageNames);

    $job->slug = $job->title !== $request->title ? Str::slug($request->title) . "-" . Str::random(5) : $job->slug;
    $job->title = $request->title;
    $job->company_id = auth()->user()->company->id;
    $job->job_category = $jobCategories;
    $job->employment_level = $request->employment_level;
    $job->salary_structure = $request->salary_structure;
    $job->salary_min = $request->salary_min;
    $job->salary_max = $request->salary_max;
    $job->deadline = $request->deadline;
    $job->experience = $request->experience;
    $job->academic_level = $request->academic_level;
    $job->gender = $request->gender;
    $job->quantity = $request->quantity;
    $job->work_mode = $request->work_mode;
    $job->province = $request->province;
    $job->district = $request->district;
    $job->ward = $request->ward;
    $job->address = $request->address;
    $job->description = $request->description;
    $job->requirement = $request->requirement;
    $job->advanced_skills = $request->advanced_skills;
    $job->soft_skills = $softSkills;
    $job->foreign_languages = $foreignLanguages;
    $job->benefits = $request->benefits;
    $job->request_to_apply = $request->request_to_apply;
    $job->contact_person = $request->contact_person;
    $job->contact_email = $request->contact_email;
    $job->contact_phone = $request->contact_phone;
    $job->save();

    flash()->addSuccess('Cập nhật tin tuyển dụng thành công!', "Thành công");

    return redirect()->route("company.jobs.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $job = Job::findOrFail($id);
      $job->delete();
      $company = Company::find(auth()->user()->company->id);
      $company->used_post = $company->used_post - 1;
      $company->save();

      if ($job->is_featured == 1) {
        $company->used_featured_post = $company->used_featured_post - 1;
        $company->save();
      }

      return response([
        "success" => true,
      ]);
    } catch (\Exception $e) {
      return response([
        "success" => false,
      ]);
    }
  }

  public function changeStatus(Request $request)
  {
    $job = Job::findOrFail($request->id);
    $job->status = $request->status == "true" ? 1 : 0;
    $job->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }

  public function changeFeatured(Request $request)
  {
    $job = Job::findOrFail($request->id);
    $company = Company::find(auth()->user()->company->id);

    if ($company->limit_featured_post == $company->used_featured_post && $request->status == "true") {
      return response([
        "success" => false,
        "message" => "Bạn đã sử dụng hết số lượng bài tuyển dụng nổi bật tối đa!",
        "reload" => true
      ]);
    }

    $job->is_featured = $request->status == "true" ? 1 : 0;
    $job->save();

    $findFeaturedPost = FeaturedPost::where(["post_id" => $request->id, "company_id" => $company->id])->first();

    if ($request->status == "true" && $findFeaturedPost == null) {

      $featuredPost = new FeaturedPost();
      $featuredPost->post_id = $request->id;
      $featuredPost->company_id = auth()->user()->company->id;
      $featuredPost->save();

      $company->used_featured_post = $company->used_featured_post + 1;
      $company->save();
    }

    if ($request->status == "false" && $findFeaturedPost != null) {

      $findFeaturedPost->delete();
      $company->used_featured_post = $company->used_featured_post - 1;
      $company->save();
    }

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái thành công!",
    ]);
  }

  public function applications(Request $request, $id)
  {
    $job = Job::findOrFail($id);
    $applications = AppliedJob::with("candidate", "job")->where("job_id", $id)->get();

    return view("frontend.company-dashboard.job.application", compact("job", "applications"));
  }

  public function applicationShow(Request $request, $id, $candidate_id)
  {
    $myJob = AppliedJob::with("job", "candidate")->where("id", $id)->where("candidate_id", $candidate_id)->first();
    $candidate = Candidate::find($candidate_id);

    if ($request->ajax()) {
      $html = view('frontend.candidate-dashboard.my-jobs-applied.my-jobs-modal', compact('myJob', 'candidate'))->render();

      return response()->json($html);
    }
  }

  public function changeStatusApplication(Request $request)
  {
    $application = AppliedJob::where(["id" => $request->id, "candidate_id" => $request->candidate_id])->first();

    $application->status = $request->status;
    $application->save();

    return response([
      "success" => true,
      "message" => "Cập nhật trạng thái ứng tuyển thành công!",
    ]);
  }
}

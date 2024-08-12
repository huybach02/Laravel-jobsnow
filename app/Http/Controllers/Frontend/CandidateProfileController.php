<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateProfileContactRequest;
use App\Http\Requests\Frontend\CandidateProfileInfoRequest;
use App\Models\AcademicLevel;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateLanguage;
use App\Models\CandidateWork;
use App\Models\CommuneWard;
use App\Models\DesiredSalary;
use App\Models\District;
use App\Models\EmploymentLevel;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\ProvinceCity;
use App\Models\SoftSkill;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CandidateProfileController extends Controller
{
  use FileUploadTrait;

  public function index()
  {
    $candidate = Candidate::where("user_id", auth()->user()->id)->first();
    $professions = Profession::all();
    $employmentLevels = EmploymentLevel::all();
    $desiredSalaries = DesiredSalary::all();
    $experiences = Experience::all();
    $provinces = ProvinceCity::all();
    $academicLevels = AcademicLevel::all();
    $softSkills = SoftSkill::all();
    $languages = Language::all();

    $educations = [];
    $works = [];
    if ($candidate) {
      $educations = CandidateEducation::where(["candidate_id" => $candidate->id])->get();
      $works = CandidateWork::where(["candidate_id" => $candidate->id])->get();
    }

    $districts = [];
    $wards = [];

    if ($candidate) {
      $districts = District::select("code", "name", "code_name")->where(["province_code" => $candidate->province, "status" => 1])->get();
      $wards = CommuneWard::select("code", "name", "code_name")->where(["district_code" => $candidate->district, "status" => 1])->get();
    }

    return view('frontend.candidate-dashboard.profile.index', compact('professions', 'employmentLevels', 'desiredSalaries', 'experiences', 'candidate', 'provinces', 'districts', 'wards', 'academicLevels', 'softSkills', 'languages', 'educations', 'works'));
  }

  public function updateInfo(CandidateProfileInfoRequest $request)
  {
    $candidate = Candidate::where("user_id", auth()->user()->id)->first();

    $logoPath = $this->uploadFile($request, "image", "uploads/candidate/avatar", $candidate ? $candidate->image : null);
    $cvPath = $this->uploadFile($request, "cv_link", "uploads/candidate/cv", $candidate ? $candidate->cv_link : null);

    $data = [];

    if ($logoPath) $data["image"] = $logoPath;
    if ($cvPath) $data["cv_link"] = $cvPath;

    $data["full_name"] = $request->full_name;
    $data["slug"] = Str::slug($request->full_name) . "-" . str()->random(8);
    $data["birthday"] = $request->birthday;
    $data["gender"] = $request->gender;
    $data["marital_status"] = $request->marital_status;
    $data["profession_id"] = $request->profession_id;
    $data["experience_id"] = $request->experience_id;
    $data["employment_level_id"] = $request->employment_level_id;
    $data["desired_salary_id"] = $request->desired_salary_id;
    $data["bio"] = $request->bio;
    $data["career_goals"] = $request->career_goals;

    Candidate::updateOrCreate(
      ["user_id" => auth()->user()->id],
      $data
    );

    $user = User::find(auth()->user()->id);

    if ($user->name != $request->full_name) {
      $user->name = $request->full_name;
      $user->save();
    }

    if (isCandidateProfileCompleted()) {
      $candidate->profile_completed = 1;
      $candidate->status = 1;
      $candidate->save();
    }

    flash()->addSuccess('Cập nhật thông tin thành công!', "Thành công");

    return redirect()->back();
  }

  public function updateContact(CandidateProfileContactRequest $request)
  {
    $candidate = Candidate::where("user_id", auth()->user()->id)->first();

    Candidate::updateOrCreate(
      ["user_id" => auth()->user()->id],
      [
        "email" => $request->email,
        "phone" => $request->phone,
        "fb_link" => $request->fb_link,
        "province" => $request->province,
        "district" => $request->district,
        "ward" => $request->ward,
        "address" => $request->address,
        "workplace_desired" => implode(", ", $request->workplace_desired)
      ]
    );

    if (isCompanyProfileCompleted()) {
      $candidate->profile_completed = 1;
      $candidate->status = 1;
      $candidate->save();
    }

    if (isCandidateProfileCompleted()) {
      $candidate->profile_completed = 1;
      $candidate->status = 1;
      $candidate->save();
    }

    flash()->addSuccess('Cập nhật thông tin thành công!', "Thành công");

    return redirect()->back();
  }

  public function updateOther(Request $request)
  {
    $candidate = Candidate::where("user_id", auth()->user()->id)->first();

    $request->validate([
      "academic_level_id" => ["required"],
      "soft_skills" => ["array", "required"],
      "foreign_languages" => ["array", "required"],
      "advanced_skills" => ["required"],
      "computer_skills" => ["required"],
    ]);

    $softSkills = implode(",", $request->soft_skills);

    $languageNames = Language::whereIn('id', $request->foreign_languages)->pluck('name')->toArray();

    $foreignLanguages = implode(",", $languageNames);

    Candidate::updateOrCreate(
      ["user_id" => auth()->user()->id],
      [
        "academic_level_id" => $request->academic_level_id,
        "soft_skills" => $softSkills,
        "foreign_languages" => $foreignLanguages,
        "advanced_skills" => $request->advanced_skills,
        "computer_skills" => $request->computer_skills
      ]
    );

    CandidateLanguage::where("candidate_id", $candidate->id)->delete();

    foreach ($request->foreign_languages as $language) {
      $newLanguage = new CandidateLanguage();
      $newLanguage->candidate_id = $candidate->id;
      $newLanguage->language_id = $language;
      $newLanguage->save();
    }

    if (isCandidateProfileCompleted()) {
      $candidate->profile_completed = 1;
      $candidate->status = 1;
      $candidate->save();
    }

    flash()->addSuccess('Cập nhật thông tin thành công!', "Thành công");

    return redirect()->back();
  }

  public function getEducation(Request $request)
  {
    $candidate = Candidate::where("user_id", auth()->user()->id)->first();

    $educations = CandidateEducation::where("candidate_id", $candidate->id)->orderBy("id", "asc")->get();

    return view('frontend.candidate-dashboard.profile.sections.ajax-education-table', compact('educations'))->render();
  }

  public function createEducation(Request $request)
  {
    $request->validate([
      "name_education" => ["required"],
      "training_unit" => ["required"],
      "start_date" => ["required"],
      "end_date" => ["required"],
      "rating" => ["required"],
    ]);

    $education = new CandidateEducation();

    $education->candidate_id = auth()->user()->candidate->id;
    $education->name_education = $request->name_education;
    $education->training_unit = $request->training_unit;
    $education->start_date = $request->start_date;
    $education->end_date = $request->end_date;
    $education->rating = $request->rating;
    $education->save();

    return response([
      "id" => $education->id,
      "success" => true,
      "data" => $education,
      "message" => "Tạo mới học vấn/bằng cấp thành công"
    ]);
  }

  public function editEducation($id)
  {
    $education = CandidateEducation::findOrFail($id);

    return response([
      "success" => true,
      "data" => $education
    ]);
  }

  public function updateEducation(Request $request, $id)
  {
    $request->validate([
      "name_education" => ["required"],
      "training_unit" => ["required"],
      "start_date" => ["required"],
      "end_date" => ["required"],
      "rating" => ["required"],
    ]);

    $education = CandidateEducation::findOrFail($id);

    $education->candidate_id = auth()->user()->candidate->id;
    $education->name_education = $request->name_education;
    $education->training_unit = $request->training_unit;
    $education->start_date = $request->start_date;
    $education->end_date = $request->end_date;
    $education->rating = $request->rating;
    $education->save();

    return response([
      "success" => true,
      "message" => "Cập nhật học vấn/bằng cấp thành công"
    ]);
  }

  public function deleteEducation($id)
  {
    $education = CandidateEducation::findOrFail($id);
    $education->delete();
    return response([
      "success" => true,
      "message" => "Xóa học vấn/bằng cấp thành công"
    ]);
  }

  public function getWork(Request $request)
  {
    $candidate = Candidate::where("user_id", auth()->user()->id)->first();

    $works = CandidateWork::where("candidate_id", $candidate->id)->orderBy("id", "asc")->get();

    return view('frontend.candidate-dashboard.profile.sections.ajax-work-table', compact('works'))->render();
  }

  public function createWork(Request $request)
  {
    $request->validate([
      "name_company" => ["required"],
      "position" => ["required"],
      "start_date" => ["required"],
      "end_date" => ["required"],
      "description" => ["required"],
    ]);

    $work = new CandidateWork();

    $work->candidate_id = auth()->user()->candidate->id;
    $work->name_company = $request->name_company;
    $work->position = $request->position;
    $work->start_date = $request->start_date;
    $work->end_date = $request->end_date;
    $work->current_working = $request->current_working ? 1 : 0;
    $work->description = $request->description;
    $work->save();

    return response([
      "id" => $work->id,
      "success" => true,
      "data" => $work,
      "message" => "Tạo mới quá trình làm việc thành công"
    ]);
  }

  public function editWork($id)
  {
    $work = CandidateWork::findOrFail($id);

    return response([
      "success" => true,
      "data" => $work
    ]);
  }

  public function updateWork(Request $request, $id)
  {
    $request->validate([
      "name_company" => ["required"],
      "position" => ["required"],
      "start_date" => ["required"],
      "end_date" => ["required"],
      "description" => ["required"],
    ]);

    $work = CandidateWork::findOrFail($id);

    $work->candidate_id = auth()->user()->candidate->id;
    $work->name_company = $request->name_company;
    $work->position = $request->position;
    $work->start_date = $request->start_date;
    $work->end_date = $request->end_date;
    $work->current_working = $request->current_working == null ? 0 : 1;
    $work->description = $request->description;
    $work->save();

    return response([
      "success" => true,
      "message" => "Cập nhật quá trình làm việc thành công"
    ]);
  }

  public function deleteWork($id)
  {
    $work = CandidateWork::findOrFail($id);
    $work->delete();
    return response([
      "success" => true,
      "message" => "Xóa quá trình làm việc thành công"
    ]);
  }

  public function updateEmail(Request $request)
  {
    $request->validate([
      "email" => "required|email|unique:users,email," . auth()->user()->id
    ]);

    $user = User::find(auth()->user()->id);
    $user->email = $request->email;
    $user->save();

    if ($request->allow_show) {
      $candidate = Candidate::where("user_id", auth()->user()->id)->first();
      $candidate->allow_show = 1;
      $candidate->save();
    } else {
      $candidate = Candidate::where("user_id", auth()->user()->id)->first();
      $candidate->allow_show = 0;
      $candidate->save();
    }

    flash()->addSuccess('Cập nhật thành công!', "Thành công");
    return redirect()->back();
  }

  public function updatePassword(Request $request)
  {
    $user = User::find(auth()->user()->id);

    $request->validate([
      "current_password" => ["required", function ($attribute, $value, $fail) use ($user) {
        if (!Hash::check($value, $user->password)) {
          return $fail('Current password is incorrect.');
        }
      }],
      "password" => "required|confirmed|min:8"
    ]);

    $user->password = bcrypt($request->password);
    $user->save();

    flash()->addSuccess('Cập nhật mật khẩu thành công!', "Thành công");
    return redirect()->back();
  }

  public function changeTypeTab(Request $request)
  {
    session()->put("type_tab", $request->type);
  }
}

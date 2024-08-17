<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyProfileContactRequest;
use App\Http\Requests\Frontend\CompanyProfileRequest;
use App\Models\CommuneWard;
use App\Models\Company;
use App\Models\District;
use App\Models\IndustryType;
use App\Models\OrganizationType;
use App\Models\ProvinceCity;
use App\Models\TeamSize;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyProfileController extends Controller
{
  use FileUploadTrait;

  public function index()
  {
    $company = Company::where("user_id", auth()->user()->id)->first();
    $industryTypes = IndustryType::all();
    $organizationTypes = OrganizationType::all();
    $teamSizes = TeamSize::all();
    $provinces = ProvinceCity::all();

    $districts = [];
    $wards = [];

    if ($company) {
      $districts = District::select("code", "name", "code_name")->where(["province_code" => $company->province, "status" => 1])->get();
      $wards = CommuneWard::select("code", "name", "code_name")->where(["district_code" => $company->district, "status" => 1])->get();
    }

    return view("frontend.company-dashboard.profile.index", compact("company", "industryTypes", "organizationTypes", "teamSizes", "provinces", "districts", "wards"));
  }

  public function updateInfo(CompanyProfileRequest $request)
  {
    $company = Company::where("user_id", auth()->user()->id)->first();

    $logoPath = $this->uploadFile($request, "logo", "uploads/company/logo", $company ? $company->logo : null);
    $bannerPath = $this->uploadFile($request, "banner", "uploads/company/banner", $company ? $company->banner : null);

    $data = [];

    if ($logoPath) $data["logo"] = $logoPath;
    if ($bannerPath) $data["banner"] = $bannerPath;

    $data["name"] = $request->name;
    $data["slug"] = Str::slug($request->name);
    $data["industry_type_id"] = $request->industry_type_id;
    $data["organization_type_id"] = $request->organization_type_id;
    $data["team_size_id"] = $request->team_size_id;
    $data["tax_code"] = $request->tax_code;
    $data["established_date"] = $request->established_date;
    $data["bio"] = $request->bio;
    $data["vision"] = $request->vision;

    Company::updateOrCreate(
      ["user_id" => auth()->user()->id],
      $data
    );

    $user = User::find(auth()->user()->id);

    if ($user->name != $request->name) {
      $user->name = $request->name;
      $user->save();
    }

    if (isCompanyProfileCompleted()) {
      $company->profile_completed = 1;
      $company->status = 1;
      $company->limit_post = $company->limit_post == 0 ? 1 : $company->limit_post;
      $company->save();
    }

    flash()->addSuccess('Cập nhật thông tin thành công!', "Thành công");

    return redirect()->back();
  }

  public function updateContact(CompanyProfileContactRequest $request)
  {
    $company = Company::where("user_id", auth()->user()->id)->first();

    Company::updateOrCreate(
      ["user_id" => auth()->user()->id],
      [
        "email" => $request->email,
        "phone" => $request->phone,
        "website_link" => $request->website_link,
        "fb_link" => $request->fb_link,
        "province" => $request->province,
        "district" => $request->district,
        "ward" => $request->ward,
        "address" => $request->address,
        "map_link" => $request->map_link
      ]
    );

    if (isCompanyProfileCompleted()) {
      $company->profile_completed = 1;
      $company->status = 1;
      $company->limit_post = $company->limit_post == 0 ? 1 : $company->limit_post;
      $company->save();
    }

    flash()->addSuccess('Cập nhật thông tin thành công!', "Thành công");

    return redirect()->back();
  }

  public function updateEmail(Request $request)
  {
    $request->validate([
      "email" => "required|email|unique:users,email," . auth()->user()->id
    ]);

    $user = User::find(auth()->user()->id);
    $user->email = $request->email;
    $user->save();

    flash()->addSuccess('Cập nhật email thành công!', "Thành công");
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

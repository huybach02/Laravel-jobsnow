<?php

use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\CandidateProfileController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CompanyOrderController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use App\Http\Controllers\Frontend\FrontendCandidateController;
use App\Http\Controllers\Frontend\FrontendCompanyController;
use App\Http\Controllers\Frontend\FrontendJobController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, "index"])->name("home");

// Company List
Route::get("companies", [FrontendCompanyController::class, "index"])->name("companies.index");
Route::get("company-info/{slug}", [FrontendCompanyController::class, "show"])->name("company-info.show");

// Candidate List
Route::get("candidates", [FrontendCandidateController::class, "index"])->name("candidates.index");
Route::get("candidate-info/{slug}", [FrontendCandidateController::class, "show"])->name("candidate-info.show");

// Jobs
Route::get("jobs", [FrontendJobController::class, "index"])->name("jobs.index");
Route::get("jobs/{slug}", [FrontendJobController::class, "show"])->name("jobs.show");

// Candidate
Route::prefix("candidate")->as("candidate.")->middleware(["auth", "verified", "role:candidate"])->group(function () {
  Route::get('dashboard', [CandidateDashboardController::class, "index"])->name('dashboard');
  Route::get("profile", [CandidateProfileController::class, "index"])->name("profile.index");
  Route::post("profile/info", [CandidateProfileController::class, "updateInfo"])->name("profile.update-info");
  Route::post("profile/contact", [CandidateProfileController::class, "updateContact"])->name("profile.update-contact");
  Route::post("profile/other", [CandidateProfileController::class, "updateOther"])->name("profile.update-other");

  Route::get("profile/get-education", [CandidateProfileController::class, "getEducation"])->name("profile.get-education");
  Route::post("profile/create-education", [CandidateProfileController::class, "createEducation"])->name("profile.create-education");
  Route::get("profile/edit-education/{id}", [CandidateProfileController::class, "editEducation"])->name("profile.edit-education");
  Route::post("profile/update-education/{id}", [CandidateProfileController::class, "updateEducation"])->name("profile.update-education");
  Route::delete("profile/delete-education/{id}", [CandidateProfileController::class, "deleteEducation"])->name("profile.delete-education");

  Route::get("profile/get-work", [CandidateProfileController::class, "getWork"])->name("profile.get-work");
  Route::post("profile/create-work", [CandidateProfileController::class, "createWork"])->name("profile.create-work");
  Route::get("profile/edit-work/{id}", [CandidateProfileController::class, "editWork"])->name("profile.edit-work");
  Route::post("profile/update-work/{id}", [CandidateProfileController::class, "updateWork"])->name("profile.update-work");
  Route::delete("profile/delete-work/{id}", [CandidateProfileController::class, "deleteWork"])->name("profile.delete-work");

  Route::post("profile/change-email", [CandidateProfileController::class, "updateEmail"])->name("profile.update-email");
  Route::post("profile/change-password", [CandidateProfileController::class, "updatePassword"])->name("profile.update-password");

  Route::get("change-type-tab", [CandidateProfileController::class, "changeTypeTab"])->name("change-type-tab");
});

// Company
Route::prefix("company")->as("company.")->middleware(["auth", "verified", "role:company"])->group(function () {
  Route::get('dashboard', [CompanyDashboardController::class, "index"])->name('dashboard');
  Route::get("profile", [CompanyProfileController::class, "index"])->name("profile.index");
  Route::post("profile/info", [CompanyProfileController::class, "updateInfo"])->name("profile.update-info");
  Route::post("profile/contact", [CompanyProfileController::class, "updateContact"])->name("profile.update-contact");
  Route::post("profile/change-email", [CompanyProfileController::class, "updateEmail"])->name("profile.update-email");
  Route::post("profile/change-password", [CompanyProfileController::class, "updatePassword"])->name("profile.update-password");
  Route::get("change-type-tab", [CompanyProfileController::class, "changeTypeTab"])->name("change-type-tab");
  Route::get("checkout/{plan_id}", [CheckoutController::class, "index"])->name("checkout");
  Route::post("vnpay-payment", [CheckoutController::class, "vnpayPayment"])->name("vnpay.payment");
  Route::get("payment-success/{id}", [CheckoutController::class, "paymentSuccess"])->name("payment.success");
  Route::get("orders", [CompanyOrderController::class, "index"])->name("orders.index");
  Route::get("orders/{id}", [CompanyOrderController::class, "show"])->name("orders.show");

  Route::put("jobs/change-status", [JobController::class, "changeStatus"])->name("jobs.change-status");
  Route::put("jobs/change-featured", [JobController::class, "changeFeatured"])->name("jobs.change-featured");
  Route::resource('jobs', JobController::class);
});

// Upload File Tinymce
Route::post('/upload', function (Request $request) {
  if ($request->hasFile("file")) {
    $image = $request->file('file');
    $ext = $image->getClientOriginalExtension();
    $imageName = "image_" . uniqid() . "." . $ext;
    $image->move(public_path("uploads/tinymce_images"), $imageName);

    return response()->json(['location' =>  asset("uploads/tinymce_images" . "/" . $imageName)]);
  }
})->name("upload");

// Location
Route::get("get-districts/{province_code}", [LocationController::class, "getDistricts"])->name("get-districts");
Route::get("get-wards/{district_code}", [LocationController::class, "getWards"])->name("get-wards");


Route::fallback(function () {
  return redirect()->route('home');
});

require __DIR__ . '/auth.php';

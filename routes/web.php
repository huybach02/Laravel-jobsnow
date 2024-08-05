<?php

use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\CompanyProfileController;
use App\Http\Controllers\Frontend\HomeController;
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

// Candidate
Route::prefix("candidate")->as("candidate.")->middleware(["auth", "verified", "role:candidate"])->group(function () {
  Route::get('dashboard', [CandidateDashboardController::class, "index"])->name('dashboard');
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

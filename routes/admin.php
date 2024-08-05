<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CommuneWardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\ProvinceCityController;
use App\Http\Controllers\Admin\TeamSizeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {
  Route::get("/", function () {
    return redirect()->route("admin.login");
  });
  Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

    Route::fallback(function () {
      return redirect()->route('admin.login');
    });
  });

  Route::middleware('auth:admin')->group(function () {
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Industries Types
    Route::put("industry-types/change-status", [IndustryTypeController::class, "changeStatus"])->name("industry-types.change-status");
    Route::resource('industry-types', IndustryTypeController::class);

    // Organization Types
    Route::put("organization-types/change-status", [OrganizationTypeController::class, "changeStatus"])->name("organization-types.change-status");
    Route::resource("organization-types", OrganizationTypeController::class);

    // Team size
    Route::put("team-sizes/change-status", [TeamSizeController::class, "changeStatus"])->name("team-sizes.change-status");
    Route::resource("team-sizes", TeamSizeController::class);

    // Province City
    Route::put("province-cities/change-status", [ProvinceCityController::class, "changeStatus"])->name("province-cities.change-status");
    Route::resource("province-cities", ProvinceCityController::class);

    // District
    Route::put("districts/change-status", [DistrictController::class, "changeStatus"])->name("districts.change-status");
    Route::resource("districts", DistrictController::class);

    // Commune Wards
    Route::put("commune-wards/change-status", [CommuneWardController::class, "changeStatus"])->name("commune-wards.change-status");
    Route::resource("commune-wards", CommuneWardController::class);
  });
});
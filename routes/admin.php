<?php

use App\Http\Controllers\Admin\AcademicLevelController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CommuneWardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesiredSalaryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\EmploymentLevelController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\ProvinceCityController;
use App\Http\Controllers\Admin\SalaryStructureController;
use App\Http\Controllers\Admin\SoftSkillController;
use App\Http\Controllers\Admin\TeamSizeController;
use App\Http\Controllers\Admin\WorkModeController;
use App\Http\Controllers\PostController;
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

    // Languages
    Route::put("languages/change-status", [LanguageController::class, "changeStatus"])->name("languages.change-status");
    Route::resource("languages", LanguageController::class);

    // Profession
    Route::put("professions/change-status", [ProfessionController::class, "changeStatus"])->name("professions.change-status");
    Route::resource("professions", ProfessionController::class);

    // Employment Level
    Route::put("employment-levels/change-status", [EmploymentLevelController::class, "changeStatus"])->name("employment-levels.change-status");
    Route::resource("employment-levels", EmploymentLevelController::class);

    // Desired Salary
    Route::put("desired-salaries/change-status", [DesiredSalaryController::class, "changeStatus"])->name("desired-salaries.change-status");
    Route::resource("desired-salaries", DesiredSalaryController::class);

    // Soft Skills
    Route::put("soft-skills/change-status", [SoftSkillController::class, "changeStatus"])->name("soft-skills.change-status");
    Route::resource("soft-skills", SoftSkillController::class);

    // Experience
    Route::put("experiences/change-status", [ExperienceController::class, "changeStatus"])->name("experiences.change-status");
    Route::resource("experiences", ExperienceController::class);

    // Academic level
    Route::put("academic-levels/change-status", [AcademicLevelController::class, "changeStatus"])->name("academic-levels.change-status");
    Route::resource("academic-levels", AcademicLevelController::class);

    // Plan
    Route::resource("plans", PlanController::class);

    // Orders
    Route::get("orders", [OrderController::class, "index"])->name("orders.index");
    Route::get("orders/{id}", [OrderController::class, "show"])->name("orders.show");

    // Job Category
    Route::put("job-categories/change-status", [JobCategoryController::class, "changeStatus"])->name("job-categories.change-status");
    Route::resource("job-categories", JobCategoryController::class);

    // Education Category
    Route::put("academic-levels-list/change-status", [AcademicLevelController::class, "changeStatus"])->name("academic-levels-list.change-status");
    Route::resource("academic-levels-list", AcademicLevelController::class);

    // Employment Level Job Category
    Route::put("employment-levels-list/change-status", [EmploymentLevelController::class, "changeStatus"])->name("employment-levels-list.change-status");
    Route::resource("employment-levels-list", EmploymentLevelController::class);

    // Experience Job Category
    Route::put("experiences-list/change-status", [ExperienceController::class, "changeStatus"])->name("experiences-list.change-status");
    Route::resource("experiences-list", ExperienceController::class);

    // Soft Skill Job Category
    Route::put("soft-skills-list/change-status", [SoftSkillController::class, "changeStatus"])->name("soft-skills-list.change-status");
    Route::resource("soft-skills-list", SoftSkillController::class);

    // Languages Category
    Route::put("languages-list/change-status", [LanguageController::class, "changeStatus"])->name("languages-list.change-status");
    Route::resource("languages-list", LanguageController::class);

    // Salary Structure
    Route::put("salary-structures/change-status", [SalaryStructureController::class, "changeStatus"])->name("salary-structures.change-status");
    Route::resource("salary-structures", SalaryStructureController::class);

    // Work Mode
    Route::put("work-modes/change-status", [WorkModeController::class, "changeStatus"])->name("work-modes.change-status");
    Route::resource("work-modes", WorkModeController::class);

    // Blog
    Route::put("blogs/change-status", [BlogController::class, "changeStatus"])->name("blogs.change-status");
    Route::resource("blogs", BlogController::class);

    // Home Manage
    Route::get("hero-section", [HomeController::class, "heroIndex"])->name("home-section.index");
    Route::post("hero-section", [HomeController::class, "heroUpdate"])->name("home-section.update");
    Route::get("featured-categories-section", [HomeController::class, "featuredCategories"])->name("featured-categories-section.index");
    Route::put("featured-categories-section/change-status", [HomeController::class, "featuredCategoriesChangeStatus"])->name("featured-categories-section.change-status");
    Route::put("featured-categories-section/change-status-job-featured", [HomeController::class, "featuredCategoriesChangeStatusJobFeatured"])->name("featured-categories-section.change-status-job-featured");

    // Post
    Route::get("posts", [PostController::class, "index"])->name("posts.index");
    Route::put("posts/change-status", [PostController::class, "changeStatus"])->name("posts.change-status");
  });
});

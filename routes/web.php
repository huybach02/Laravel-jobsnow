<?php

use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\CompanyDashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Candidate
Route::prefix("candidate")->as("candidate.")->middleware(["auth", "verified", "role:candidate"])->group(function () {
  Route::get('dashboard', [CandidateDashboardController::class, "index"])->name('dashboard');
});

// Company
Route::prefix("company")->as("company.")->middleware(["auth", "verified", "role:company"])->group(function () {
  Route::get('dashboard', [CompanyDashboardController::class, "index"])->name('dashboard');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
  return redirect()->route('home');
});

require __DIR__ . '/auth.php';

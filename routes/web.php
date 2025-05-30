<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TrackController;

Route::get('/', function () {
    return view('welcome');
});

# Dashboard page
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

# Call function and display form document page
Route::get('/letter', [LetterController::class, 'create'])->middleware(['auth', 'verified'])->name('letter');
Route::post('/letter', [LetterController::class, 'store'])->middleware(['auth', 'verified'])->name('letters.store');

# Call edit & update function and display editDoc page
Route::get('/letters/{id}/edit', [LetterController::class, 'edit'])->name('letters.edit');
Route::put('/letters/{id}', [LetterController::class, 'update'])->name('letters.update');

# Call delete function and display history page
Route::delete('/letters/{id}', [LetterController::class, 'destroy'])->name('letters.destroy');

# History/record page
Route::get('/history', function () {
    return view('history');
})->middleware(['auth', 'verified'])->name('history');

Route::get('/history', [LetterController::class, 'index'])->middleware(['auth', 'verified'])->name('history');

# Staff list display page
Route::get('/staff', function () {
    return view('staff');
})->middleware(['auth', 'verified'])->name('staff');

Route::get('/staff', [StaffController::class, 'index'])->name('staff');

# Call edit & update function and display editUser page
Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
Route::put('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');

# Call delete function and display staff page
Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');

# Form add user page and function call
Route::get('/staff/add', [StaffController::class, 'create'])->name('staffAdd');
Route::get('/staffAdd', [StaffController::class, 'index'])->name('staff.index');
Route::get('/staffAdd/create', [StaffController::class, 'create'])->name('staff.create');
Route::post('/staffAdd', [StaffController::class, 'store'])->name('staff.store');

Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::get('/report/download', [ReportController::class, 'downloadPdf'])->name('report.download');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Track Routes
Route::get('/track/{letter}', [TrackController::class, 'create'])->name('tracks.create');
Route::post('/track', [TrackController::class, 'store'])->name('tracks.store');
Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/track-history/{letter}', [TrackController::class, 'show'])->name('tracks.show');

require __DIR__.'/auth.php';

<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DistrictController;
// use App\Http\Controllers\ElectionDivisionController;
// use App\Http\Controllers\CandidateController;
// use App\Http\Controllers\ElectionResultController;
// use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
// Route::get('/district/add', [DistrictController::class, 'create'])->name('district.create');
// Route::post('/district/store', [DistrictController::class, 'store'])->name('district.store');

// Route::get('/election-division/add', [ElectionDivisionController::class, 'create'])->name('election-division.create');
// Route::post('/election-division/store', [ElectionDivisionController::class, 'store'])->name('election-division.store');

// Route::get('/candidate/add', [CandidateController::class, 'create'])->name('candidate.create');
// Route::post('/candidate/store', [CandidateController::class, 'store'])->name('candidate.store');

// Route::get('/election-results/add', [ElectionResultController::class, 'create'])->name('election-results.create');
// Route::post('/election-results/store', [ElectionResultController::class, 'store'])->name('election-results.store');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::resource('election-results', ElectionResultController::class);


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ElectionDivisionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionResultController;
use App\Http\Controllers\DashboardController;
use App\Models\District; // Import the District model
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\DistrictImageController;

Route::get('/', function () {
    $districts = District::all(); // Fetch all districts from the database
    return view('welcome', compact('districts')); // Pass the districts to the view
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/district/add', [DistrictController::class, 'create'])->name('district.create');
Route::post('/district/store', [DistrictController::class, 'store'])->name('district.store');

Route::get('/election-division/add', [ElectionDivisionController::class, 'create'])->name('election-division.create');
Route::post('/election-division/store', [ElectionDivisionController::class, 'store'])->name('election-division.store');

Route::get('/candidate/add', [CandidateController::class, 'create'])->name('candidate.create');
Route::post('/candidate/store', [CandidateController::class, 'store'])->name('candidate.store');

Route::get('/election-results/add', [ElectionResultController::class, 'create'])->name('election-results.create');
Route::post('/election-results/store', [ElectionResultController::class, 'store'])->name('election-results.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('election-results', ElectionResultController::class);

Route::get('/districts/{district}/divisions', [ElectionController::class, 'viewDivisions'])->name('divisions.view');
Route::get('/districts/{district}/divisions', [ElectionController::class, 'viewDivisions'])->name('divisions.view');
Route::get('/districts/{district}/divisions', [ElectionDivisionController::class, 'showDivisions'])->name('district.divisions');

Route::get('/divisions/{division}/results', [ElectionResultController::class, 'showResults'])->name('division.results');

Route::get('/district-image/create', [DistrictImageController::class, 'create'])->name('district-image.create');
Route::post('/district-image/store', [DistrictImageController::class, 'store'])->name('district-image.store');

Route::get('/districts/{district}', [DistrictController::class, 'showDistrict'])->name('district.divisions');

// routes/web.php
// routes/web.php
Route::get('/districts/{id}/divisions', [ElectionDivisionController::class, 'showDivisions'])->name('district.divisions');


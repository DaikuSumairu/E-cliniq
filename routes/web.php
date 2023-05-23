<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/////////////
// Student //
/////////////
Route::middleware(['auth', 'user-access:student'])->group(function () {
    Route::get('/student/home', [HomeController::class, 'studentHome'])->name('student.home');

    //Record
    Route::resource('student/records', RecordController::class)->names([
        'index' => 'student.recordIndex',
    ])->except([
        'create', 'store', 'show', 'edit', 'update', 'delete'
    ]);

});

/////////////
// Faculty //
/////////////
Route::middleware(['auth', 'user-access:faculty'])->group(function () {
    Route::get('/faculty/home', [HomeController::class, 'facultyHome'])->name('faculty.home');

    //Record
    Route::resource('faculty/records', RecordController::class)->names([
        'index' => 'faculty.recordIndex',
    ])->except([
        'create', 'store', 'show', 'edit', 'update', 'delete'
    ]);
});

////////////
// Doctor //
////////////
Route::middleware(['auth', 'user-access:doctor'])->group(function () {
    Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctor.home');

    //Record
    Route::resource('doctor/records', RecordController::class)->names([
        'index' => 'doctor.recordIndex',
        'show' => 'doctor.recordShow',
    ])->except([
        'create','store', 'edit', 'update', 'delete'
    ]);
});

/////////////
// Dentist //
/////////////
Route::middleware(['auth', 'user-access:dentist'])->group(function () {
    Route::get('/dentist/home', [HomeController::class, 'dentistHome'])->name('dentist.home');

    //Record
    Route::resource('dentist/records', RecordController::class)->names([
        'index' => 'dentist.recordIndex',
        'show' => 'dentist.recordShow',
    ])->except([
        'create','store', 'edit', 'update', 'delete'
    ]);
});

///////////
// Nurse //
///////////
Route::middleware(['auth', 'user-access:nurse'])->group(function () {
    Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurse.home');

    //Record
    Route::resource('nurse/records', RecordController::class)->names([
        'index' => 'nurse.recordIndex',
        'store' => 'nurse.recordStore',
        'show' => 'nurse.recordShow',
        'update' => 'nurse.recordUpdate',
    ])->except([
        'create','edit'
    ]);


});

///////////
// Admin //
///////////
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

});
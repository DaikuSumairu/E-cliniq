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

});

/////////////
// Faculty //
/////////////
Route::middleware(['auth', 'user-access:faculty'])->group(function () {
    Route::get('/faculty/home', [HomeController::class, 'facultyHome'])->name('faculty.home');

});

////////////
// Doctor //
////////////
Route::middleware(['auth', 'user-access:doctor'])->group(function () {
    Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctor.home');

});

/////////////
// Dentist //
/////////////
Route::middleware(['auth', 'user-access:dentist'])->group(function () {
    Route::get('/dentist/home', [HomeController::class, 'dentistHome'])->name('dentist.home');

});

///////////
// Nurse //
///////////
Route::middleware(['auth', 'user-access:nurse'])->group(function () {
    Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurse.home');

    //Record
    Route::resource('nurse/records', RecordController::class)->names([
        'index' => 'nurse.recordIndex',
        //'create' => 'nurse.recordCreate',
        'store' => 'nurse.recordStore',
        'show' => 'nurse.recordShow',
        //'edit' => 'nurse.recordEdit',
        'update' => 'nurse.recordUpdate',
        //'delete' => 'nurse.recordDelete',
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
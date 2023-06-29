<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\MedicalExamController;
use App\Http\Controllers\DentalExamController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\VisitController;

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

    //Appointment
    Route::resource('student/appointments', AppointmentController::class)->names([
        'index' => 'student.appointmentIndex',
        'update' => 'student.appointmentUpdate',
        'store' => 'student.appointmentStore',
        'destroy' => 'student.appointmentDestroy'
    ])->except([
        'show', 'create', 'edit'
    ]);

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

    //Appointment
    Route::resource('faculty/appointments', AppointmentController::class)->names([
        'index' => 'faculty.appointmentIndex',
        'update' => 'faculty.appointmentUpdate',
        'store' => 'faculty.appointmentStore',
        'destroy' => 'faculty.appointmentDestroy'
    ])->except([
        'show', 'create', 'edit'
    ]);

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

    //Appointment
    Route::resource('doctor/appointments', AppointmentController::class)->names([
        'index' => 'doctor.appointmentIndex',
        'update' => 'doctor.appointmentUpdate',
        'store' => 'doctor.appointmentStore',
        'destroy' => 'doctor.appointmentDestroy'
    ])->except([
        'show', 'create', 'edit'
    ]);
    Route::get('/search', [AppointmentController::class, 'search']);

    //Record
    Route::resource('doctor/records', RecordController::class)->names([
        'index' => 'doctor.recordIndex',
        'show' => 'doctor.recordShow',
    ])->except([
        'create','store', 'edit', 'update', 'delete'
    ]);

    //Record Item (Consultation)
    Route::resource('doctor/records/consultation', ConsultationController::class)->names([
        'store' => 'doctor.consultationStore',
        'edit' => 'doctor.consultationEdit',
        'update' => 'doctor.consultationUpdate',
    ])->except([
        'index', 'show', 'delete'
    ]);
    Route::get('doctor/records/consultation/create/{record}', [ConsultationController::class, 'create'])
        ->name('doctor.consultationCreate');

    //Record Item (Medical Exam)
    Route::resource('doctor/records/medical_exam', MedicalExamController::class)->names([
        'store' => 'doctor.medExamStore',
        'edit' => 'doctor.medExamEdit',
        'update' => 'doctor.medExamUpdate',
    ])->except([
        'index', 'show', 'delete'
    ]);
    Route::get('doctor/records/medical_exam/create/{record}', [MedicalExamController::class, 'create'])
        ->name('doctor.medExamCreate');
});

/////////////
// Dentist //
/////////////
Route::middleware(['auth', 'user-access:dentist'])->group(function () {
    Route::get('/dentist/home', [HomeController::class, 'dentistHome'])->name('dentist.home');

    //Appointment
    Route::resource('dentist/appointments', AppointmentController::class)->names([
        'index' => 'dentist.appointmentIndex',
        'update' => 'dentist.appointmentUpdate',
        'store' => 'dentist.appointmentStore',
        'destroy' => 'dentist.appointmentDestroy'
    ])->except([
        'show', 'create', 'edit'
    ]);
    Route::get('/search', [AppointmentController::class, 'search']);

    //Record
    Route::resource('dentist/records', RecordController::class)->names([
        'index' => 'dentist.recordIndex',
        'show' => 'dentist.recordShow',
    ])->except([
        'create','store', 'edit', 'update', 'delete'
    ]);

    //Record Item (Dental Exam)
    Route::resource('dentist/records/dental_exam', DentalExamController::class)->names([
        'store' => 'dentist.dentalExamStore',
        'edit' => 'dentist.dentalExamEdit',
        'update' => 'dentist.dentalExamUpdate',
    ])->except([
        'index', 'show', 'delete'
    ]);
    Route::get('dentist/records/dental_exam/create/{record}', [DentalExamController::class, 'create'])
        ->name('dentist.dentalExamCreate');
});

///////////
// Nurse //
///////////
Route::middleware(['auth', 'user-access:nurse'])->group(function () {
    Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurse.home');

    //Visit
    Route::resource('nurse/daily', VisitController::class)->names([
        'update' => 'nurse.visitUpdate',
        'store' => 'nurse.visitStore',
    ])->except([
        'index', 'show', 'create', 'edit', 'destroy'
    ]);

    //Appointment
    Route::resource('nurse/appointments', AppointmentController::class)->names([
        'index' => 'nurse.appointmentIndex',
        'update' => 'nurse.appointmentUpdate',
        'store' => 'nurse.appointmentStore',
        'destroy' => 'nurse.appointmentDestroy'
    ])->except([
        'show', 'create', 'edit'
    ]);
    Route::get('/search', [AppointmentController::class, 'search']);

    //Record
    Route::resource('nurse/records', RecordController::class)->names([
        'index' => 'nurse.recordIndex',
        'show' => 'nurse.recordShow',
        'update' => 'nurse.recordUpdate',
    ])->except([
        'create', 'store', 'edit'
    ]);

    //Record Item (Consultation)
    Route::resource('nurse/records/consultation', ConsultationController::class)->names([
        'store' => 'nurse.consultationStore',
        'edit' => 'nurse.consultationEdit',
        'update' => 'nurse.consultationUpdate',
    ])->except([
        'index', 'show', 'destroy'
    ]);
    Route::get('nurse/records/consultation/create/{record}', [ConsultationController::class, 'create'])
        ->name('nurse.consultationCreate');

    //Record Item (Medical Exam)
    Route::resource('nurse/records/medical_exam', MedicalExamController::class)->names([
        'store' => 'nurse.medExamStore',
        'edit' => 'nurse.medExamEdit',
        'update' => 'nurse.medExamUpdate',
    ])->except([
        'index', 'show', 'destroy'
    ]);
    Route::get('nurse/records/medical_exam/create/{record}', [MedicalExamController::class, 'create'])
        ->name('nurse.medExamCreate');

    //Inventory
    Route::resource('nurse/inventory', InventoryController::class)->names([
        'index' => 'nurse.inventoryIndex',
        'store' => 'nurse.inventoryStore',
        'update' => 'nurse.inventoryUpdate',
        'show' => 'nurse.inventoryShow',
        'destroy' => 'nurse.inventoryDestroy',
    ])->except([
        'create', 'edit'
    ]);
});

///////////
// Admin //
///////////
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

});
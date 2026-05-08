<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Staff;
use App\Models\Service;


Route::get('/', function () {

    return view('home', [

        'appointmentsCount' =>
            Appointment::count(),

        'customersCount' =>
            Customer::count(),

        'staffCount' =>
            Staff::count(),

        'servicesCount' =>
            Service::count(),

        'bookedCount' =>
            Appointment::where(
                'status',
                'booked'
            )->count(),

        'completedCount' =>
            Appointment::where(
                'status',
                'completed'
            )->count(),

    ]);

})->name('home');

Route::get('/appointments', [AppointmentController::class, 'index'])
    ->name('appointments.index');

Route::get('/appointments/create', [AppointmentController::class, 'create'])
    ->name('appointments.create');

Route::post('/appointments', [AppointmentController::class, 'store'])
    ->name('appointments.store');

Route::put('/appointments/{appointment}/complete',
    [AppointmentController::class, 'complete'])
    ->name('appointments.complete');

Route::put('/appointments/{appointment}/cancel',
    [AppointmentController::class, 'cancel'])
    ->name('appointments.cancel');

Route::post('/appointments/available-slots',
    [AppointmentController::class, 'availableSlots'])
    ->name('appointments.slots');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*
Route::get('/hello/{name}', function ($name) {
    return "Hello, " . ucfirst($name) . "!";
})->name('hello');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
*/

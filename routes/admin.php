<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

// RUTA DEL STUDENT
Route::resource('students', StudentController::class)->names('students'); // prefijo admin => admin.students.ruta

Route::resource('tutors', TutorController::class)->names('tutors'); // prefijo admin  => admin.tutors.ruta


// RUTA DEL TUTOR
Route::get('students/{student}/tutor',
[StudentController::class, 'tutor'])
->name('students.tutor');

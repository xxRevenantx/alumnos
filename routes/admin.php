<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

// RUTA DEL STUDENT
Route::resource('students', StudentController::class)->names('students');


// RUTA DEL TUTOR
Route::get('students/{student}/tutor',
[StudentController::class, 'tutor'])
->name('students.tutor');
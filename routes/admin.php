<?php

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

// RUTAS SUPERVISOR
Route::resource('supervisores', SupervisorController::class)->names('supervisores'); // prefijo admin => admin.supervisores.ruta

// RUTAS DIRECTOR
Route::resource('directores', DirectorController::class)->names('directores'); // prefijo admin => admin.directores.ruta

// RUTAS DEL NIVEL
Route::resource('niveles', LevelController::class)->names('levels'); // prefijo admin => admin.niveles.ruta

// RUTAS DEL NIVEL
Route::resource('grupos', GroupController::class)->names('groups'); // prefijo admin => admin.niveles.ruta

// ESCUELA
Route::resource('mi-escuela', SchoolController::class)->names('school');


// RUTA DEL STUDENT
Route::resource('students', StudentController::class)->names('students'); // prefijo admin => admin.students.ruta

Route::resource('tutors', TutorController::class)->names('tutors'); // prefijo admin  => admin.tutors.ruta





// RUTA DEL TUTOR
Route::get('students/{student}/tutor',
[StudentController::class, 'tutor'])
->name('students.tutor');


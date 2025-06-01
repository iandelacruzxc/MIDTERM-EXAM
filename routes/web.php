<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource('courses', CourseController::class);
Route::resource('instructors', InstructorController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('students', StudentController::class);

Route::get('students/{student}/assign-courses', [StudentController::class, 'assignCoursesForm'])->name('students.assign-courses');
Route::post('students/{student}/assign-courses', [StudentController::class, 'assignCourses'])->name('students.assign-courses.store');

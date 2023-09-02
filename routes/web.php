<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/authenticate',[\App\Http\Controllers\AuthController::class,'authentication'])->name('authenticate');
Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
Route::get('/register',[\App\Http\Controllers\AuthController::class,'show_register'])->name('show_register');
Route::post('/register',[\App\Http\Controllers\AuthController::class,'do_register'])->name('do_register');


Route::prefix('admin')->middleware(['auth'])->group(function (){
    Route::get('/',function (){return view('admin/adminDashbord');})->name('adminDashbord');
    Route::resource('user',App\Http\Controllers\admin\UserController::class);
    Route::get('/users/teachers', [App\Http\Controllers\admin\UserController::class ,'teachersIndex'])->name('users.teachers.index');
    Route::get('/users/students', [App\Http\Controllers\admin\UserController::class ,'studentsIndex'])->name('users.students.index');
    Route::resource('admin_course',App\Http\Controllers\CourseController::class);
    Route::get('/courses/add_course',function (){return view('admin/courses/add_course');})->name('add_course');
});

Route::prefix('teacher')->middleware(['auth'])->group(function (){
    Route::get('/',function (){return view('teacher/teacherDashbord');})->name('teacherDashbord');
    Route::resource('teacher',App\Http\Controllers\TeacherController::class);
    Route::get('/list_student',function (){return view('teacher/list-student');})->name('list_student');
    Route::resource('teacher_course',App\Http\Controllers\CourseController::class);
    Route::resource('assignment',App\Http\Controllers\AssignmentController::class);
    Route::get('/showCourses', [App\Http\Controllers\CourseController::class ,'teachersIndex'])->name('teachers.courses.index');
});

Route::prefix('student')->middleware(['auth'])->group(function (){
    Route::get('/',function (){return view('student/studentDashboard');})->name('studentDashboard');
    Route::resource('course',App\Http\Controllers\CourseController::class);
    Route::resource('student_assignment',App\Http\Controllers\AssignmentController::class);
    Route::resource('answer',\App\Http\Controllers\AnswerController::class);
    Route::get('/showCourses', [App\Http\Controllers\CourseController::class ,'studentsIndex'])->name('students.courses.index');
    Route::post('/answer/store/{assignment_id}', [App\Http\Controllers\AnswerController::class ,'store'])->name('answer.store');
    Route::get('/download/{filename}', [App\Http\Controllers\AnswerController::class ,'download'])->name('download');
    Route::get('/answer/index/{status}', [App\Http\Controllers\AnswerController::class ,'index'])->name('answer.index');
});

Route::put('/teacher/teacher_course}', [\App\Http\Controllers\CourseController::class,'update'])->name('update');



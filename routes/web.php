<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\MarksController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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
})->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//Admin
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::resource('/admin/group', GroupController::class);
    Route::resource('/admin/teacher', TeacherController::class);
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/student', StudentController::class);
    Route::resource('/admin/subject', SubjectController::class);
    Route::get('/admin/marks', [App\Http\Controllers\Admin\MarksController::class, 'index'])->name('marks.index');
    Route::get('/admin/marks/show/{group}', [App\Http\Controllers\Admin\MarksController::class, 'showsubject'])->name('marks.showsubject');
    Route::get('/admin/marks/show/{groups}/{subjects}', [App\Http\Controllers\Admin\MarksController::class, 'showmarks'])->name('marks.showmarks');
    Route::get('/admin/marks/show/{groups}/{subjects}/{student}/{sm_id}', [App\Http\Controllers\Admin\MarksController::class, 'editmarks'])->name('marks.edit');
    Route::post('/admin/marks/show/{groups}/{subjects}/{student}/{sm_id}', [App\Http\Controllers\Admin\MarksController::class, 'update'])->name('marks.update');
    Route::get('/admin/subjectclass', [App\Http\Controllers\Admin\SubjectclassController::class, 'index'])->name('subjectclass.index');
    Route::get('/admin/subjectclass/show', [App\Http\Controllers\Admin\SubjectclassController::class, 'show'])->name('subjectclass.show');
    Route::delete('/admin/subjectclass/show/{sc}', [App\Http\Controllers\Admin\SubjectclassController::class, 'destroy']);
    Route::get('/admin/subjectclass/create', [App\Http\Controllers\Admin\SubjectclassController::class, 'create'])->name('subjectclass.create');
    Route::post('/admin/subjectclass', [App\Http\Controllers\Admin\SubjectclassController::class, 'store'])->name('subjectclass.store');
    Route::get('/admin/teachersubject', [App\Http\Controllers\Admin\TeachersubjectController::class, 'index'])->name('teachersubject.index');
    Route::get('/admin/teachersubject/show', [App\Http\Controllers\Admin\TeachersubjectController::class, 'show'])->name('teachersubject.show');
    Route::delete('/admin/teachersubject/show/{ts}', [App\Http\Controllers\Admin\TeachersubjectController::class, 'destroy']);
    Route::get('/admin/teachersubject/create', [App\Http\Controllers\Admin\TeachersubjectController::class, 'create'])->name('teachersubject.create');
    Route::post('/admin/teachersubject', [App\Http\Controllers\Admin\TeachersubjectController::class, 'store'])->name('teachersubject.store');

});

//Student
Route::middleware(['auth', 'can:isStudent'])->group(function () {
    Route::get('/student/group', [App\Http\Controllers\Student\StudentgroupController::class, 'index'])->name('studentgroup.index');
    Route::get('/student/group/{group}', [App\Http\Controllers\Student\StudentgroupController::class, 'show'])->name('studentgroup.show');
    Route::get('/student/teacher', [App\Http\Controllers\Student\StudentteacherController::class, 'index'])->name('studentteacher.index');
    Route::get('/student/info', [App\Http\Controllers\Student\StudentinfoController::class, 'index'])->name('studentinfo.index');
    Route::get('/student/info/{user}', [App\Http\Controllers\Student\StudentinfoController::class, 'edit'])->name('studentinfo.edit');
    Route::post('/student/info/{user}', [App\Http\Controllers\Student\StudentinfoController::class, 'update'])->name('studentinfo.update');
    Route::get('/student/marks', [App\Http\Controllers\Student\StudentmarksController::class, 'index'])->name('studentmarks.index');
});


//Teacher
Route::middleware(['auth', 'can:isTeacher'])->group(function () {


});

//Route::get('/admin/group', [App\Http\Controllers\Admin\StudentgroupController::class, 'index'])->name('AdminGroup')->middleware('auth'); //group.index
//Route::get('/admin/group/create', [App\Http\Controllers\Admin\StudentgroupController::class, 'create'])->name('AdminGroupCreate')->middleware('auth'); //group.create
//Route::post('/admin/group', [App\Http\Controllers\Admin\StudentgroupController::class, 'store'])->name('AdminGroupStore')->middleware('auth'); //group.store
//Route::get('/admin/group/edit/{group}', [App\Http\Controllers\Admin\StudentgroupController::class, 'edit'])->name('AdminGroupEdit')->middleware('auth'); //group.edit
//Route::post('/admin/group/{group}', [App\Http\Controllers\Admin\StudentgroupController::class, 'update'])->name('AdminGroupUpdate')->middleware('auth'); //group.update
//Route::delete('/admin/group/{group}', [App\Http\Controllers\Admin\StudentgroupController::class, 'destroy'])->middleware('auth'); //group.destroy
//Route::get('/admin/group/{group}', [App\Http\Controllers\Admin\StudentgroupController::class, 'show'])->name('AdminGroupShow')->middleware('auth'); //group.show
//Zmieniamy to na route::resource i działa to tak samo!

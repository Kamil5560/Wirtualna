<?php

use App\Http\Controllers\Admin\GroupController;
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
});

//Route::get('/admin/group', [App\Http\Controllers\Admin\GroupController::class, 'index'])->name('AdminGroup')->middleware('auth'); //group.index
//Route::get('/admin/group/create', [App\Http\Controllers\Admin\GroupController::class, 'create'])->name('AdminGroupCreate')->middleware('auth'); //group.create
//Route::post('/admin/group', [App\Http\Controllers\Admin\GroupController::class, 'store'])->name('AdminGroupStore')->middleware('auth'); //group.store
//Route::get('/admin/group/edit/{group}', [App\Http\Controllers\Admin\GroupController::class, 'edit'])->name('AdminGroupEdit')->middleware('auth'); //group.edit
//Route::post('/admin/group/{group}', [App\Http\Controllers\Admin\GroupController::class, 'update'])->name('AdminGroupUpdate')->middleware('auth'); //group.update
//Route::delete('/admin/group/{group}', [App\Http\Controllers\Admin\GroupController::class, 'destroy'])->middleware('auth'); //group.destroy
//Route::get('/admin/group/{group}', [App\Http\Controllers\Admin\GroupController::class, 'show'])->name('AdminGroupShow')->middleware('auth'); //group.show
//Zmieniamy to na route::resource i działa to tak samo!


//Student



//Teacher

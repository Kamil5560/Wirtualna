<?php

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
Route::get('/admin/teacher', [App\Http\Controllers\Admin\TeacherController::class, 'index'])->name('AdminTeacher')->middleware('auth');
Route::delete('/admin/teacher/{user}', [App\Http\Controllers\Admin\TeacherController::class, 'destroy'])->middleware('auth');

Route::get('/admin/group', [App\Http\Controllers\Admin\GroupController::class, 'index'])->name('AdminGroup')->middleware('auth');
Route::get('/admin/group/create', [App\Http\Controllers\Admin\GroupController::class, 'create'])->name('AdminGroupCreate')->middleware('auth');
Route::post('/admin/group', [App\Http\Controllers\Admin\GroupController::class, 'store'])->name('AdminGroupStore')->middleware('auth');
Route::get('/admin/group/edit/{group}', [App\Http\Controllers\Admin\GroupController::class, 'edit'])->name('AdminGroupEdit')->middleware('auth');
Route::post('/admin/group/{group}', [App\Http\Controllers\Admin\GroupController::class, 'update'])->name('AdminGroupUpdate')->middleware('auth');
Route::delete('/admin/group/{group}', [App\Http\Controllers\Admin\GroupController::class, 'destroy'])->middleware('auth');
Route::get('/admin/group/{group}', [App\Http\Controllers\Admin\GroupController::class, 'show'])->name('AdminGroupShow')->middleware('auth');

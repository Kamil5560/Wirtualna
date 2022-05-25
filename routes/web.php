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
Route::get('/admin/teacher/add', [App\Http\Controllers\TeacherAddController::class, 'index'])->middleware('auth');
Route::get('/admin/teacher/show', [App\Http\Controllers\TeacherShowController::class, 'index'])->middleware('auth');
Route::delete('/admin/teacher/show/{user}', [App\Http\Controllers\TeacherShowController::class, 'destroy'])->middleware('auth');

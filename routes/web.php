<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource("/student", StudentController::class);
Route::get('/search', [StudentController::class, 'search'])->name('search');
Route::get('/edit', [StudentController::class, 'edit'])->name('edit');
// routes/web.php
// Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
// routes/web.php
Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
// Route::patch('/student/{student}', 'StudentController@update')->name('update');
Route::put('/student/{student}', 'StudentController@update')->name('student.update');
Route::get('/index', [StudentController::class, 'index'])->name('index');

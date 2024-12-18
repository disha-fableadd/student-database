<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\studentcontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/students',[studentcontroller::class,'display'])->name('student.display');
Route::get('/students/create',[studentcontroller::class, 'create'])->name('student.create');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');

Route::put('/students/{id}', [studentcontroller::class, 'update'])->name('student.update');
Route::post('/students', [studentcontroller::class, 'store'])->name('student.store');
Route::delete('/students/{id}', [studentcontroller::class, 'destroy'])->name('student.destroy');

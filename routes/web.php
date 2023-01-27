<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
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


Route::get('/memberPage', [MemberController::class, 'index'])->name('memberPage');
Route::get('/create', [MemberController::class, 'create'])->name('create');
Route::post('/store', [MemberController::class, 'store'])->name('store');
Route::get('/show/{id}', [MemberController::class, 'show'])->name('show');
Route::get('/editMember/{id}', [MemberController::class, 'edit'])->name('edit');
Route::post('/update', [MemberController::class, 'update'])->name('update');
Route::get('/destroy/{id}', [MemberController::class, 'destroy'])->name('destroy');


Route::get('/trainerPage', [TrainerController::class, 'index'])->name('trainerPage');
Route::get('/create', [TrainerController::class, 'create'])->name('create');
Route::post('/store', [TrainerController::class, 'store'])->name('store');
Route::get('/show/{id}', [TrainerController::class, 'show'])->name('show');
Route::get('/editTrainer/{id}', [TrainerController::class, 'edit'])->name('edit');
Route::post('/update', [TrainerController::class, 'update'])->name('update');
Route::get('/destroy/{id}', [TrainerController::class, 'destroy'])->name('destroy');






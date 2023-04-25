<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserAccountController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[FormationController::class, 'index']);

Route::resource('formation', FormationController::class)
->only(['store', 'update', 'edit','destroy', 'create'])->middleware(['auth', 'role:admin']);

Route::resource('formation', FormationController::class)
->except(['store', 'update', 'edit','destroy', 'create']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only('create', 'store');
Route::resource('user-account', UserAccountController::class)
  ->only(['edit', 'destroy'])
  ->middleware('auth');

  Route::put('/user-account/{id}/edit', [UserAccountController::class, 'update'])->name('user-account.update');

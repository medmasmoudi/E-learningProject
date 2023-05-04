<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\FormationUserController;
use App\Http\Controllers\ChaptersController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class, 'index'])->name('LandingPage');

Route::resource('formation', FormationController::class)
->only(['store', 'update', 'edit','destroy', 'create'])->middleware(['auth', 'role:admin']);

Route::get('formation/download/{id}', [FormationController::class ,'download'])->name('formation.download');
Route::get('formation/files/download/{chapters}', [ChaptersController::class ,'downloadFiles'])->name('chapters.downloadFiles');

Route::resource('formation', FormationController::class)
->except(['store', 'update', 'edit','destroy', 'create']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('chapters', ChaptersController::class)->only('store','destroy');

Route::post('files.store', [FilesController::class , 'store'])->name('files.store');

Route::resource('user-account', UserAccountController::class)->only('create', 'store');
Route::resource('user-account', UserAccountController::class)
  ->only(['edit','destroy'])
  ->middleware('auth');

  Route::put('/user-account/{id}/edit', [UserAccountController::class, 'update'])->name('user-account.update');

  Route::post('join/{formation}', [FormationUserController::class, 'addFormationToUser'])->name('join');
  Route::post('unjoin/{formation}', [FormationUserController::class, 'removeFormationFromUser'])->name('unjoin');

  Route::get('/DashboardAdmin',[Dashboard::class, 'DashboardAdmin'])->name('Dashboard')->middleware(['auth', 'role:admin']);
  Route::get('/Dashboard',[Dashboard::class, 'DashboardUser'])->name('DashboardUser')->middleware('auth', 'role:user');
  Route::get('/users/{user}/formations', [Dashboard::class, 'FormationForEachUser'])->name('users.formations')->middleware(['auth', 'role:admin']);

Route::get('/formation/{id}',[ChaptersController::class,'store'])->name('formation.id');
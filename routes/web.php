<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InterviewController;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Вообще Livewire отдаётся без явного объявления контроллера,
// но изначальная реализация планировалась на простых шаблонах, но для избежания написания
// js было принято решение внедрить Livewire заодно посмотреть на технологию

Route::middleware(['auth'])->group(function (){
    Route::resource('/interview', InterviewController::class);
    Route::resource('/employee', EmployeeController::class);
});


require __DIR__.'/auth.php';

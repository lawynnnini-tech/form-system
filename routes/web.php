<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventRequestController;
use App\Http\Controllers\DashboardController;

Route::resource('event-requests', EventRequestController::class);

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
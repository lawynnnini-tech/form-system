<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventRequestController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('event-requests', EventRequestController::class);

Route::get('/event-requests/{id}/print', [EventRequestController::class, 'print'])
        ->name('event_requests.print');



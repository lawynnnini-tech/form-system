<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventRequestController;

Route::resource('event-requests', EventRequestController::class);

Route::get('/', function () {
    return view('dashboard');
});

Route::get('event-requests/{id}/print', [EventRequestController::class, 'print'])
       ->name('event_requests.print');
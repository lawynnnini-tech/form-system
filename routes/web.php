<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventRequestController;

Route::resource('event-requests', EventRequestController::class);

Route::get('/', function () {
    return view('dashboard');
});

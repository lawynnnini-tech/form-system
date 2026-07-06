<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventRequestController;
use App\Http\Controllers\DashboardController;
use App\Models\EventRequest;
Route::resource('event-requests', EventRequestController::class);

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalRequests' => EventRequest::count(),
        'approved' => EventRequest::where('status', 'Approved')->count(),
        'rejected' => EventRequest::where('status', 'Rejected')->count(),
        'pending' => EventRequest::whereNull('status')->count(),
        'recentRequests' => EventRequest::latest()->take(5)->get(),
    ]);
})->name('dashboard');
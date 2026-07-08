<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventRequestController;
use App\Http\Controllers\MaterialRequestController;


Route::resource('material-requests', MaterialRequestController::class);



Route::get('material-requests/{id}/print', [MaterialRequestController::class, 'print'])->name('material-requests.print');


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('event-requests', EventRequestController::class);

Route::get('/event-requests/{id}/print', [EventRequestController::class, 'print'])
        ->name('event-requests.print');




// 🖨 Print ထုတ်ရန်အတွက် သီးသန့် Route (Resource ရဲ့ အပေါ်မှာ ထားပေးရပါမယ်)
Route::get('material-requests/{id}/print', [MaterialRequestController::class, 'print'])->name('material-requests.print');

// သင် လက်ရှိ သုံးထားတဲ့ Resource Route
// Route::resource('material-requests', MaterialRequestController::class);
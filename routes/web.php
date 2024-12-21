<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CallrequestController;
use App\Http\Middleware\VerifyCsrfToken;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    Route::put('/device/{id_device}', [DeviceController::class, 'update'])->name('device.update');
    Route::delete('/device/{id_device}', [DeviceController::class, 'destroy'])->name('device.destroy');
    Route::get('/get-device-calls/{id_device}', [DashboardController::class, 'getDeviceCalls']);
});

Route::get('/status-call', [CallRequestController::class, 'getStatus']);

// Route::post('/call-requests', [CallRequestController::class, 'store'])->middleware(VerifyCsrfToken::class);
// Route::get('/get-csrf-token', [CallRequestController::class, 'getCsrfToken']);
// Route::post('/call-requests', [CallRequestController::class, 'store'])->middleware('csrf-token');
// Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
// Route::get('/get-csrf-token', function () {
//     return response()->json(['csrf_token' => csrf_token()]);
// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

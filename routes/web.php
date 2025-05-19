<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/home', [HomeController::class, 'store']);
Route::get('/guests/bulk-send', [App\Http\Controllers\GuestInvitationController::class, 'bulkSend'])->name('guest.bulk-send');
Route::get('/guests/{guest}/message', [App\Http\Controllers\GuestInvitationController::class, 'viewMessage'])->name('guest.view-message');
Route::get('/invitation/{guest}/{name?}', [\App\Http\Controllers\InvitationController::class, 'show'])->name('invitation.show');

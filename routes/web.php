<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin_dashboard');

//DASHBOARD VIEW
// Route::get('admin/dashboard', [UserController::class, 'dashboard'])->name('admin_dashboard');

//Officer CRUD
Route::get('admin/officer', [UserController::class, 'officer'])->name('admin_officer');
Route::post('officer/create', [UserController::class, 'createOfficer'])->name('officer_store');
Route::get('officer/edit/{user}', [UserController::class, 'editOfficer'])->name('officer_edit');
Route::put('officer/update/{user}', [UserController::class, 'updateOfficer'])->name('officer_update');
Route::get('officer/{user}/show', [UserController::class, 'showOfficer'])->name('officer_show');

//Event Crud
Route::get('admin/event', [EventController::class, 'event'])->name('admin_event');
Route::post('event/create', [EventController::class, 'createEvent'])->name('event_store');
<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

//DASHBOARD VIEW
Route::get('admin/dashboard', [UserController::class, 'dashboard'])->name('admin_dashboard');

//Officer CRUD
Route::get('admin/officer', [UserController::class, 'officer'])->name('admin_officer');
Route::post('officer/create', [UserController::class, 'createOfficer'])->name('officer_store');

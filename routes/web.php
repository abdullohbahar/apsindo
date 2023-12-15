<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Guest\LoginController;
use App\Http\Controllers\Guest\RegistrationController;
use App\Http\Controllers\Member\DashboardMemberController;
use App\Http\Controllers\Member\ProfileMemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/registrasi', [RegistrationController::class, 'index'])->name('registration');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/reset-password', [LoginController::class, 'resetPassword'])->name('reset.password');

Route::prefix('member')->group(function () {
    Route::get('dashboard', [DashboardMemberController::class, 'index'])->name('member.dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileMemberController::class, 'index'])->name('member.profile');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('member')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('admin.member');
    });
});

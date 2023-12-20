<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Guest\LoginController;
use App\Http\Controllers\Guest\RegistrationController;
use App\Http\Controllers\Member\DashboardMemberController;
use App\Http\Controllers\Member\PaymentController;
use App\Http\Controllers\Member\ProfileMemberController;
use App\Http\Controllers\Member\TransactionHistoryMemberController;
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

Route::get('/registrasi', [RegistrationController::class, 'index'])->name('registration')->middleware('guest');
Route::post('registrasi', [RegistrationController::class, 'store'])->name('save.registration')->middleware('guest');

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::get('/reset-password', [LoginController::class, 'resetPassword'])->name('reset.password')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('member')->middleware('member')->group(function () {
    Route::get('dashboard', [DashboardMemberController::class, 'index'])->name('member.dashboard');

    Route::prefix('payment')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('member.payment.page');
        Route::get('/payment', [PaymentController::class, 'payment'])->name('member.payment');
    });

    Route::prefix('riwayat-pembayaran')->group(function () {
        Route::get('/', [TransactionHistoryMemberController::class, 'index'])->name('riwayat');
    });
});

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileMemberController::class, 'index'])->name('member.profile');
    Route::put('/update/{id}', [ProfileMemberController::class, 'update'])->name('member.profile.update');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('member')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('admin.member');
        Route::get('/detail/{id}', [MemberController::class, 'detail'])->name('admin.member.detail');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/langganan', [PaymentSettingController::class, 'index'])->name('pengaturan.langganan');
        Route::post('/update-langganan', [PaymentSettingController::class, 'store'])->name('update.pengaturan.langganan');
    });
});

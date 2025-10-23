<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingAdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\ServiceController;

Route::get('/services', [ServiceController::class, 'index'])->name('services');

// Edit 
Route::middleware(['auth'])->group(function () {
    Route::get('/user/booking/{id}/edit', [UserBookingController::class, 'edit'])->name('user.booking.edit');
    Route::put('/user/booking/{id}', [BookingController::class, 'update'])->name('user.booking.update');


});

// ======================
// Halaman Umum (tanpa login)
// ======================
Route::get('/', fn() => view('home'))->name('home');
Route::get('/tentang', fn() => view('tentang'))->name('tentang');
Route::get('/lokasi', fn() => view('lokasi'))->name('lokasi');
Route::get('/kontak', fn() => view('kontak'))->name('kontak');
Route::get('/galeri', fn() => view('galeri'))->name('galeri');
Route::get('/garansi', fn() => view('garansi'))->name('garansi');

// ======================
// Forgot Password
// ======================
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// ======================
// Auth Register/Login
// ======================
Route::get('/register', [AuthUserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthUserController::class, 'register']);
Route::get('/login', [AuthUserController::class, 'userlogin'])->name('login');
Route::post('/login', [AuthUserController::class, 'authenticated'])->name('authenticated');
Route::post('/logout', [AuthUserController::class, 'logout'])->name('logout');

// ======================
// Protected Routes (User/Admin harus login)
// ======================
Route::middleware(['auth'])->group(function () {

    // ----------------------
    // Dashboard User
    // ----------------------
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');

    // ----------------------
    // Riwayat Pesanan
    // ----------------------
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

    // ----------------------
    // Booking User
    // ----------------------
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

    // ----------------------
    // Admin Routes
    // ----------------------
    Route::middleware(['admin'])->group(function () {
        // Dashboard Admin
        Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        

        // Booking Management Admin
        Route::get('/admin/bookings', [BookingAdminController::class, 'index'])->name('admin.bookings.index');
        Route::get('/admin/bookings/{id}/edit', [BookingAdminController::class, 'edit'])->name('admin.bookings.edit');
        Route::put('/admin/bookings/{id}', [BookingAdminController::class, 'update'])->name('admin.bookings.update');
        Route::patch('/admin/bookings/{id}/status', [BookingAdminController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
        Route::post('/admin/bookings/{id}/validate', [BookingAdminController::class, 'validateBooking'])->name('admin.bookings.validate');
        Route::delete('/admin/bookings/{id}', [BookingAdminController::class, 'destroy'])->name('admin.bookings.destroy');
        Route::prefix('admin')->group(function () {
    Route::resource('bookings', BookingAdminController::class)->except(['show', 'create', 'store']);
});

    });
});

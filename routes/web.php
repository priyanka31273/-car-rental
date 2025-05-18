<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController as UserCarController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');


require __DIR__.'/auth.php';

// Dashboard redirect based on role
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.profile');
})->middleware('auth')->name('dashboard');

// Admin routes with 'admin' middleware and prefix
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
   // Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', AdminRentalController::class);
    Route::resource('customers', AdminCustomerController::class);
});

// Customer routes with 'customer' middleware and prefix
Route::middleware(['auth', 'customer'])->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', fn() => view('user.profile'))->name('profile');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
});

// Public pages (no auth required)
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Browse cars (public)
Route::get('/cars', [UserCarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [UserCarController::class, 'show'])->name('cars.show');

// Booking routes (for authenticated customers)
Route::middleware(['auth', 'customer'])->group(function () {
    // Show booking form for a car
    Route::get('/book/{id}', [BookingController::class, 'showForm'])->name('booking.form');
    
    // Handle booking form submission
    Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('/bookings', [RentalController::class, 'index'])->name('rentals.index');
    Route::delete('/rentals/{id}', [RentalController::class, 'destroy'])->name('rentals.cancel');
});
Route::put('/admin/rentals/{id}/status', [\App\Http\Controllers\Admin\RentalController::class, 'updateStatus'])
    ->name('admin.rentals.updateStatus');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('user.edit-profile');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('user.update-profile');
});

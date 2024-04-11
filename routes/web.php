<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrCodeScannerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', destination: 'login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'countUsersByRole'])
    ->middleware('auth', 'verified')
    ->name('dashboard');

Route::middleware('auth', 'verified',)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// guess routes

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth', 'status', 'verified')->group(function () {

    // Route::get('register', [RoleController::class, 'roleInRegister'])->name('register');

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
}); // end of middleware group

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')->middleware('auth');

// admin Dashboard Sidebar
Route::middleware('auth', 'verified')->group(function () {

    // add new products
    Route::get('/admin-products', [ProductController::class, 'admin_new_products'])->name('admin.admin-add-products');
    Route::post('/admin/create_products', [ProductController::class, 'admin_create_products'])->name('admin.admin_new_products');

    // product list
    Route::get('/admin-list-of-products', [ProductController::class, 'admin_product_list'])->name('admin.admin-product-information');

    // // admin list
    // Route::get('/admin-list', [AdminController::class, 'admin_list'])->name('admin.admin-list');

    // user list
    Route::get('/admin-user-list', [UserController::class, 'admin_user_list'])->name('admin.admin-user-list');

    // consumed products
    Route::get('/admin-consumed-products', [ProductController::class, 'admin_consumed_products'])->name('admin.admin-consumed-products');

    // expired products
    Route::get('/admin-expired-products', [ProductController::class, 'admin_expired_products'])->name('admin.admin-expired-products');

    // // calendar of products
    // Route::get('/admin-calendar', [ProductController::class, 'calendar'])->name('user.calendar');

}); // end of middleware group

// Consumer Dashboard Sidebar
Route::middleware('auth', 'verified')->group(function () {

    // add new products
    Route::get('/products', [ProductController::class, 'user_new_products'])->name('user.add-products');
    Route::post('/products/create_products', [ProductController::class, 'create_products'])->name('user.create_products');

    // product list
    Route::get('/list-of-products', [ProductController::class, 'product_list'])->name('user.product-information');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('user.product-information.destroy');

    // update product info
    Route::patch('/products/update/{id}', [ProductController::class, 'update_products'])->name('user.product-information.update_products');

    // qr code scanner
    Route::get('/qr-code-scanner', [QrCodeScannerController::class, 'qr_code_scanner'])->name('user.qr-code-scanner');

    // bar code scanner
    Route::get('/bar-code-scanner', [QrCodeScannerController::class, 'bar_code_scanner'])->name('user.bar-code-scanner');

    // user list
    Route::get('/user-list', [UserController::class, 'user_list'])->name('user.user-list');

    // consumed products
    Route::get('/consumed-products', [ProductController::class, 'consumed_products'])->name('user.consumed-products');

    // expired products
    Route::get('/expired-products', [ProductController::class, 'expired_products'])->name('user.expired-products');

    // calendar of products
    Route::get('/calendar', [ProductController::class, 'calendar'])->name('user.calendar');
    Route::get('/events', [ProductController::class, 'getEvents'])->name('user.calendar.getEvents');
    Route::delete('/calendar/{id}', [ProductController::class, 'deleteEvent'])->name('user.calendar.deleteEvent');
    Route::put('/calendar/{id}', [ProductController::class, 'update'])->name('user.calendar.update');
    Route::put('/calendar/{id}/resize', [ProductController::class, 'resize'])->name('user.calendar.resize');
    Route::get('/events/search', [ProductController::class, 'search'])->name('user.calendar.search');

}); // end of middleware group

require __DIR__.'/auth.php';

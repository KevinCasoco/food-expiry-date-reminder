<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
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

Route::get('/', function () {
    return view('welcome');
});

// // qr code generate string format
// Route::get('qr-code', function () {
//     $string = 'kevs 404';
//     $qr_code = QrCode::generate($string);
//     return view('qr-code')->with('qr_code',$qr_code);
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::middleware('auth', 'status')->group(function () {

    // Route::get('register', [RoleController::class, 'roleInRegister'])->name('register');

    // Route::get('register', [RegisteredUserController::class, 'create'])
    //             ->name('register');

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

// Consumer Dashboard Sidebar
Route::middleware('auth', 'verified')->group(function () {

    // add new products
    Route::get('/products', [ProductController::class, 'createForm'])->name('user.add-products');
    Route::post('/products/create_products', [ProductController::class, 'create_products'])->name('user.create_products');

    // product list
    Route::get('/list-of-products', [ProductController::class, 'product_list'])->name('user.product-information');

    // qr code scanner
    Route::get('/qr-code-scanner', [QrCodeScannerController::class, 'qr_code_scanner'])->name('user.qr-code-scanner');

    // user list
    Route::get('/user-list', [UserController::class, 'user_list'])->name('user.user-list');

    // consumed products
    Route::get('/consumed-products', [ProductController::class, 'consumed_products'])->name('user.consumed-products');

    // expired products
    Route::get('/expired-products', [ProductController::class, 'expired_products'])->name('user.expired-products');

    // calendar of products
    Route::get('/calendar', [ProductController::class, 'calendar'])->name('user.calendar');

}); // end of middleware group

require __DIR__.'/auth.php';

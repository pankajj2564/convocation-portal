<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\StudentImportController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/send-otp', [StudentAuthController::class, 'sendOtp'])->name('student.send.otp');
Route::get('/student/verify-otp', [StudentAuthController::class, 'showVerifyForm'])->name('student.verify.form');
Route::post('/student/verify-otp', [StudentAuthController::class, 'verifyOtp'])->name('student.verify.otp');
Route::post('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

// Student Dashboard & Profile Routes
Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
Route::post('/student/profile/update', [StudentDashboardController::class, 'updateProfile'])->name('student.profile.update');

Route::get('/student/update-contact', [StudentAuthController::class, 'showUpdateContactForm'])->name('student.update.contact.form');
Route::post('/student/update-contact', [StudentAuthController::class, 'processUpdateContact'])->name('student.update.contact.process');

Route::get('/student/pay', [PaymentController::class, 'initiatePayment'])->name('student.pay');
Route::match(['get', 'post'], '/student/payment/success', [PaymentController::class, 'paymentSuccess'])->name('student.payment.success');
Route::match(['get', 'post'], '/student/payment/failure', [PaymentController::class, 'paymentFailure'])->name('student.payment.failure');

// Admin Auth Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Protected Admin & Staff Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/students/export', [DashboardController::class, 'export'])->name('students.export');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CSV Import (Corrected name method)
    Route::get('/import-students', [StudentImportController::class, 'showImportForm'])->name('students.import.form');
    Route::post('/import-students', [StudentImportController::class, 'import'])->name('students.import');

    // Student CRUD (Admin Only restricted inside controller)
    Route::post('/students', [DashboardController::class, 'storeStudent'])->name('students.store');
    Route::delete('/students/{id}', [DashboardController::class, 'destroyStudent'])->name('students.destroy');

    // Staff Users Management (Admin Only)
    Route::get('/users', [DashboardController::class, 'manageUsers'])->name('users.index');
    Route::post('/users', [DashboardController::class, 'storeUser'])->name('users.store');
    Route::delete('/users/{id}', [DashboardController::class, 'destroyUser'])->name('users.destroy');

    Route::get('/transactions', [DashboardController::class, 'transactions'])->name('transactions');
});
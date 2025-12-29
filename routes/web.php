<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CariNomorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    $totalLaporan = \App\Models\Laporan::count();
    $terverifikasi = \App\Models\Laporan::where('status', 'approved')->count();
    $nomorBlacklist = \App\Models\Laporan::where('status', 'approved')
        ->distinct('nomor_telepon')
        ->count('nomor_telepon');
    
    return view('welcome', compact('totalLaporan', 'terverifikasi', 'nomorBlacklist'));
})->name('home');

// About Contact
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

// Laporan Routes (Public - Tanpa Login)
Route::get('/laporan', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

// Feedback Routes (Public - Tanpa Login)
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Cari Nomor Routes (Public - Tanpa Login)
Route::get('/cari-nomor', [CariNomorController::class, 'index'])->name('cari.index');

// Admin Auth Routes (Guest Only - Belum Login)
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');

// Admin Protected Routes (Harus Login sebagai Admin)
Route::middleware(['auth:admin', 'prevent.back'])->prefix('admin')->name('admin.')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Kelola Laporan
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
    
    // Feedback
    Route::get('/feedback', [AdminController::class, 'feedback'])->name('feedback');
    
    // Spam Management (HARUS DI ATAS ROUTE LAPORAN ACTIONS!)
    Route::get('/spam', [AdminController::class, 'spam'])->name('spam');
    Route::post('/spam/{id}/restore', [AdminController::class, 'restoreSpam'])->name('spam.restore');
    Route::delete('/spam/{id}/force-delete', [AdminController::class, 'forceDeleteSpam'])->name('spam.forceDelete');
    
    // Actions untuk Laporan
    Route::post('/laporan/{id}/approve', [AdminController::class, 'approve'])->name('laporan.approve');
    Route::post('/laporan/{id}/reject', [AdminController::class, 'reject'])->name('laporan.reject');
    Route::post('/laporan/{id}/unapprove', [AdminController::class, 'unapprove'])->name('laporan.unapprove');
    Route::delete('/laporan/{id}/delete', [AdminController::class, 'delete'])->name('laporan.delete');
    Route::post('/laporan/{id}/restore', [AdminController::class, 'restore'])->name('laporan.restore');
    Route::delete('/laporan/{id}/force-delete', [AdminController::class, 'forceDelete'])->name('laporan.forceDelete');
});
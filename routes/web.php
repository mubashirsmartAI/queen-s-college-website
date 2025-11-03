<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\FacultyController as AdminFacultyController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\AdmissionController as AdminAdmissionController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/principal-message', [HomeController::class, 'principalMessage'])->name('principal-message');

// Course routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// Faculty routes
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculty/{id}', [FacultyController::class, 'show'])->name('faculty.show');

// Admission routes
Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');

// Gallery routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Additional pages
Route::get('/facilities', function () {
    return view('facilities');
})->name('facilities');

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

Route::get('/fee-structure', function () {
    return view('fee-structure');
})->name('fee-structure');

Route::get('/scholarships', function () {
    return view('scholarships');
})->name('scholarships');

Route::get('/prospectus', function () {
    return view('prospectus');
})->name('prospectus');

Route::get('/policies', function () {
    return view('policies');
})->name('policies');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Create admin user (for initial setup)
    Route::get('/create-admin', [AuthController::class, 'createAdminUser'])->name('create-admin');
    
    // Protected admin routes
    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Courses Management
        Route::resource('courses', AdminCourseController::class);
        Route::post('/courses/{course}/toggle-status', [AdminCourseController::class, 'toggleStatus'])->name('courses.toggle-status');
        
        // Faculty Management
        Route::resource('faculty', AdminFacultyController::class);
        Route::post('/faculty/{faculty}/toggle-status', [AdminFacultyController::class, 'toggleStatus'])->name('faculty.toggle-status');
        
        // Gallery Management
        Route::resource('gallery', AdminGalleryController::class);
        Route::post('/gallery/{gallery}/toggle-status', [AdminGalleryController::class, 'toggleStatus'])->name('gallery.toggle-status');
        
        // Notifications Management
        Route::resource('notifications', AdminNotificationController::class);
        Route::post('/notifications/{notification}/toggle-status', [AdminNotificationController::class, 'toggleStatus'])->name('notifications.toggle-status');
        Route::post('/notifications/{notification}/toggle-featured', [AdminNotificationController::class, 'toggleFeatured'])->name('notifications.toggle-featured');
        
        // Facilities Management
        Route::resource('facilities', AdminFacilityController::class);
        Route::post('/facilities/{facility}/toggle-status', [AdminFacilityController::class, 'toggleStatus'])->name('facilities.toggle-status');
        
        // Admissions Management
        Route::resource('admissions', AdminAdmissionController::class)->except(['create', 'store']);
        Route::post('/admissions/{admission}/approve', [AdminAdmissionController::class, 'approve'])->name('admissions.approve');
        Route::post('/admissions/{admission}/reject', [AdminAdmissionController::class, 'reject'])->name('admissions.reject');
        Route::post('/admissions/{admission}/pending', [AdminAdmissionController::class, 'pending'])->name('admissions.pending');
    });
});

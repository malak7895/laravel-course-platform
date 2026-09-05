<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

// الصفحة الرئيسية أو إعادة توجيه لصفحة تسجيل الدخول
Route::get('/', function () {
    return redirect()->route('login');
});

// مسارات تسجيل الدخول
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// مسارات إنشاء الحساب
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// تسجيل الخروج
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// مسارات الكورسات والمشروع (المحمية بميدل وير الـ Auth عشان محدش يدخل غير وهو عامل تسجيل دخول)
Route::middleware(['auth'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    
    // مسارات التسجيل في الكورسات
    Route::get('/courses/{id}/enroll', [CourseController::class, 'enrollForm'])->name('courses.enroll');
    Route::post('/courses/enroll', [CourseController::class, 'enrollSubmit'])->name('courses.enroll.submit');
    Route::get('/my-courses', [CourseController::class, 'myCourses'])->name('my.courses');
});
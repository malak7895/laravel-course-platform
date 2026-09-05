<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make sure to create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// مسارات الكورسات والتحكم فيها
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// راوت استقبال طلب التسجيل في الكورس (المسؤول عن المشكلة)
Route::post('/courses/{id}/enroll', [CourseController::class, 'enroll'])->name('enroll.submit');

// مسارات المصادقة الافتراضية لو موجوده عندك
require __DIR__.'/auth.php';
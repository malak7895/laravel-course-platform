<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // تأكدي إن الموديل معموله استيراد

class CourseController extends Controller
{
    // دالة عرض تفاصيل الكورس أو صفحة التسجيل
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    // الدالة الخاصة بمعالجة التسجيل اللي بتعمل الإيرور
    public function enroll($id)
    {
        $course = Course::findOrFail($id);

        // هنا بيكتب كود حفظ التسجيل في قاعدة البيانات (ح حسب جدول السجيل عندك)
        // مثال بسيط:
        // auth()->user()->courses()->attach($id);

        return redirect()->back()->with('success', 'تم التسجيل في الكورس بنجاح!');
    }
}
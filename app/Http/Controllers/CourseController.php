<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // عرض جميع الكورسات
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // عرض صفحة إضافة كورس جديد
    public function create()
    {
        return view('courses.create');
    }

    // حفظ كورس جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'تم إضافة الكورس بنجاح!');
    }

    // عرض صفحة إدخال بيانات الدفع والتسجيل للكورس
    public function enrollForm($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.enroll', compact('course'));
    }

    // استقبال وتسجيل بيانات الدفع وحفظها في قاعدة البيانات
    public function enrollSubmit(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'phone' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        Enrollment::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('my.courses')->with('success', 'تم الاشتراك في الكورس بنجاح!');
    }

    // عرض كورسات الطالب المشترك فيها فقط
    public function myCourses()
    {
        $enrollments = Enrollment::where('user_id', auth()->id())->with('course')->get();
        return view('courses.my-courses', compact('enrollments'));
    }
}
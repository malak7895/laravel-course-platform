<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // عرض صفحة التسجيل (Register View) - اختيارية لو حابة تعرضي الفورم
    public function showRegister()
    {
        return view('auth.register');
    }

    // دالة تنفيذ التسجيل (Register)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // تسجيل الدخول مباشرة بعد إنشاء الحساب
        Auth::login($user);

        return redirect()->route('courses.index')->with('success', 'تم إنشاء الحساب وتسجيل الدخول بنجاح!');
    }

    // عرض صفحة تسجيل الدخول (Login View)
    public function showLogin()
    {
        return view('auth.login');
    }

    // دالة تنفيذ تسجيل الدخول (Login)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // التوجيه لصفحة الكورسات مباشرة بعد النجاح
            return redirect()->intended('/courses');
        }

        return back()->withErrors([
            'email' => 'البيانات المدخلة غير صحيحة.',
        ])->onlyInput('email');
    }

    // تسجيل الخروج (Logout)
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
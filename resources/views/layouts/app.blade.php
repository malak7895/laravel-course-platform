<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة الكورسات</title>
    <!-- استدعاء Tailwind CSS للتصميم -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- الـ Navbar المشتركة في كل الصفحات -->
    <nav class="bg-indigo-600 shadow-lg text-white">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('courses.index') }}" class="text-xl font-bold">🚀 منصة الكورسات</a>
            <div class="space-x-4 space-x-reverse">
                <a href="{{ route('courses.index') }}" class="hover:bg-indigo-700 px-3 py-2 rounded-lg transition">قائمة الكورسات</a>
                <a href="{{ route('courses.create') }}" class="bg-white text-indigo-600 font-semibold px-4 py-2 rounded-lg hover:bg-gray-100 transition">إضافة كورس جديد</a>
            </div>
        </div>
    </nav>

    <!-- محتوى الصفحات -->
    <main class="max-w-6xl mx-auto mt-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
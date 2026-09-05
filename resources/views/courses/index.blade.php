<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة الكورسات التعليمية</title>
    <!-- Bootstrap 5 RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- شريط التنقل -->
    <nav class="navbar navbar-dark bg-dark mb-4 px-4 shadow-sm">
        <a class="navbar-brand" href="{{ route('courses.index') }}">
            <i class="fa-solid fa-graduation-cap ms-2"></i>منصة الكورسات
        </a>
        <div class="d-flex align-items-center">
            @auth
                <span class="text-light ms-3 small">مرحباً، {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fa-solid fa-right-from-bracket"></i> تسجيل الخروج
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                    <i class="fa-solid fa-right-to-bracket"></i> تسجيل الدخول
                </a>
            @endauth
        </div>
    </nav>

    <!-- محتوى الصفحة -->
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>الكورسات المتاحة</h2>
            <span class="badge bg-secondary fs-6">عدد الكورسات: {{ count($courses) }}</span>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            @forelse($courses as $course)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary fw-bold">{{ $course->name }}</h5>
                            <p class="card-text text-secondary flex-grow-1">{{ $course->description }}</p>
                            
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span>السعر:</span>
                                    <strong class="text-success">{{ $course->price }} ج.م</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span>عدد الساعات:</span>
                                    <span>{{ $course->hours }} ساعة</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span>المستوى:</span>
                                    <span class="badge bg-info text-dark">{{ $course->level }}</span>
                                </li>
                            </ul>

                            <!-- زر الاشتراك في الكورس -->
                            <div class="mt-auto pt-2 border-top">
                                <a href="{{ route('courses.enroll', $course->id) }}" class="btn btn-success w-100">
                                    <i class="fa-solid fa-cart-shopping ms-1"></i> اشترك الآن
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-warning py-4">لا توجد كورسات مضافة حالياً.</div>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
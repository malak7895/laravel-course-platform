<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كورساتي المشترك بها</title>
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
            <a href="{{ route('courses.index') }}" class="btn btn-outline-light btn-sm ms-3">جميع الكورسات</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">تسجيل الخروج</button>
            </form>
        </div>
    </nav>

    <div class="container py-3">
        <h2 class="mb-4 text-primary fw-bold">الكورسات المشترك بها</h2>

        @if(session('success'))
            <div class="alert alert-success text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            @forelse($enrollments as $enrollment)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 border-top border-success border-4">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-dark fw-bold">{{ $enrollment->course->name }}</h5>
                            <p class="card-text text-secondary flex-grow-1">{{ $enrollment->course->description }}</p>
                            
                            <ul class="list-group list-group-flush mb-3 small">
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>السعر المدفوع:</span>
                                    <strong class="text-success">{{ $enrollment->course->price }} ج.م</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>طريقة الدفع:</span>
                                    <span class="badge bg-secondary">{{ $enrollment->payment_method }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <span>تاريخ الاشتراك:</span>
                                    <span>{{ $enrollment->created_at->format('Y-m-d') }}</span>
                                </li>
                            </ul>

                            <button class="btn btn-outline-primary w-100 btn-sm" disabled>
                                <i class="fa-solid fa-play-circle ms-1"></i> ابدأ التعلم (قريباً)
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-warning py-5">
                        <h4>لم تقم بالاشتراك في أي كورس بعد!</h4>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3">تصفح الكورسات المتاحة</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
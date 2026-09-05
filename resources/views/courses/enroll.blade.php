<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الاشتراك والدفع</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="text-primary m-0">إتمام الاشتراك في الكورس</h3>
                        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm">العودة للكورسات</a>
                    </div>
                    <hr>
                    
                    <!-- تفاصيل الكورس المختار -->
                    <div class="alert alert-info">
                        <h5 class="fw-bold">{{ $course->name }}</h5>
                        <p class="mb-2 text-muted">{{ $course->description }}</p>
                        <strong class="text-success fs-5">السعر المطلوب: {{ $course->price }} ج.م</strong>
                    </div>

                    <!-- فورم إدخال بيانات الدفع والتواصل -->
                    <form action="{{ route('enroll.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <div class="mb-3">
                            <label class="form-label">الاسم بالكامل</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">رقم الهاتف للتواصل</label>
                            <input type="text" name="phone" class="form-control" required placeholder="أدخل رقم الهاتف للتواصل معك...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">طريقة الدفع</label>
                            <select name="payment_method" class="form-select" required>
                                <option value="" disabled selected>اختر طريقة الدفع...</option>
                                <option value="vodafone_cash">فودافون كاش</option>
                                <option value="bank_transfer">تحويل بنكي</option>
                                <option value="credit_card">بطاقة ائتمانية</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                            <i class="fa-solid fa-check-circle ms-1"></i> تأكيد ودفع الاشتراك
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
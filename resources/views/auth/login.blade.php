<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <!-- Bootstrap 5 RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm p-4" style="width: 400px;">
        <h3 class="text-center mb-4 text-primary">تسجيل الدخول</h3>

        @if($errors->any())
            <div class="alert alert-danger text-center py-2">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">دخول</button>

            <div class="text-center">
                <p class="text-muted small">ليس لديك حساب؟ <a href="{{ route('register.form') }}" class="text-decoration-none">إنشاء حساب جديد</a></p>
            </div>
        </form>
    </div>

</body>
</html>
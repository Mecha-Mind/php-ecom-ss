{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- SEO --}}
    <title>@yield('title', 'المتجر الإلكتروني')</title>
    <meta name="description" content="@yield('description', 'وصف المتجر')">
    
    {{-- Bootstrap RTL --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    {{-- CSS بتاعك --}}
    @vite(['resources/css/app.css'])

</head>
<body>

    {{-- الـ Navbar Component --}}
    <x-navbar
        :categories="$categories ?? []"
        branch-name="فرع المعادي"
        phone="01000000000"
    />

    {{-- المحتوى الرئيسي --}}
    <main id="main-content" role="main">
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            defer></script>

    @yield('scripts')
</body>
</html>
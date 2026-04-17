{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- SEO --}}
    <title>@yield('title', 'المتجر الإلكتروني')</title>
    <meta name="description" content="@yield('description', '')">
    
    {{-- Bootstrap RTL --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap">
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    {{-- CSS بتاعك --}}
    @vite(['resources/css/app.css'])
    @vite(['resources/css/home.css'])

</head>
<body>

    {{-- الـ Navbar Component --}}
     @include('components.navbar', [
        'staticLinks' => $staticLinks ?? [],
        'navData'     => $navData     ?? [],
        'branchName'  => $branchName  ?? '',
        'phone'       => $phone       ?? '',
    ])

    {{-- المحتوى الرئيسي --}}
    <main id="main-content" role="main">
        @yield('content')
    </main>
    @include('components.footer', [
        'footer'     => $footer     ?? [],
        'categories' => isset($navData['categories']) ? $navData['categories'] : [],
    ])
    

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            defer></script>

    @yield('scripts')
</body>
</html>
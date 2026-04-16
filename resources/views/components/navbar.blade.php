{{-- resources/views/components/navbar.blade.php --}}

@props([
    'categories' => [],
    'branchName' => 'الفرع الرئيسي',
    'phone'      => '01000000000',
])

{{-- ══════════════════════════════════════════
     TOP BAR
══════════════════════════════════════════ --}}
<div class="top-bar py-1 bg-var-primary text-white">
    <div class="container container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center top-bar__wrapper">

            {{-- رقم التليفون --}}
            <a href="tel:{{ $phone }}"
               class="top-bar__phone text-white text-decoration-none d-flex align-items-center gap-2"
               aria-label="اتصل بنا على {{ $phone }}">
                <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                <span>{{ $phone }}</span>
            </a>

            {{-- اسم الفرع --}}
            <span class="top-bar__branch d-flex align-items-center gap-2">
                <i class="bi bi-shop" aria-hidden="true"></i>
                {{ $branchName }}
            </span>

        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MAIN NAVBAR
══════════════════════════════════════════ --}}
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top w-100"
     role="navigation"
     aria-label="القائمة الرئيسية">

    <div class="container container-fluid px-4">

        {{-- ── الجزء الأول: اللوجو ── --}}
        <a class="navbar-brand" href="{{ route('home') }}" aria-label="الصفحة الرئيسية">
            <img src="{{ asset('images/logo.svg') }}"
                 alt="شعار المتجر"
                 width="120"
                 height="40"
                 loading="eager">
        </a>

        {{-- ── زرار الـ Hamburger للموبايل ── --}}
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav"
                aria-controls="mainNav"
                aria-expanded="false"
                aria-label="فتح القائمة">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- ── الجزء التاني: اللينكات (flex-1) ── --}}
        <div class="collapse navbar-collapse" id="mainNav">

            <ul class="navbar-nav mx-auto gap-1" role="list">

                @foreach($categories as $category)
                <li class="nav-item {{ count($category['children']) ? 'dropdown' : '' }}"
                    role="listitem">

                    @if(count($category['children']))
                        {{-- Category فيها Submenu --}}
                        <a class="nav-link dropdown-toggle fw-medium"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           aria-haspopup="true">
                            {{ $category['name'] }}
                        </a>

                        <ul class="dropdown-menu border-0 shadow-sm" role="menu">
                            @foreach($category['children'] as $child)
                            <li role="none">
                                <a class="dropdown-item"
                                   href="{{ route('category.show', $child['slug']) }}"
                                   role="menuitem">
                                    {{ $child['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    @else
                        {{-- Category عادية بدون Submenu --}}
                        <a class="nav-link fw-medium"
                           href="{{ route('category.show', $category['slug']) }}"
                           aria-current="{{ request()->is('category/'.$category['slug'].'*') ? 'page' : 'false' }}">
                            {{ $category['name'] }}
                        </a>
                    @endif

                </li>
                @endforeach

            </ul>

            {{-- ── الجزء التالت: الأيقونات ── --}}
            <div class="navbar-icons d-flex align-items-center gap-3 ms-lg-3 mt-3 mt-lg-0">

                {{-- Search --}}
                <button class="btn btn-link p-0 text-dark"
                        type="button"
                        aria-label="بحث"
                        data-bs-toggle="modal"
                        data-bs-target="#searchModal">
                    <i class="bi bi-search fs-5" aria-hidden="true"></i>
                </button>

                {{-- User --}}
                <a href="{{ route('account') }}"
                   class="btn btn-link p-0 text-dark"
                   aria-label="حسابي">
                    <i class="bi bi-person fs-5" aria-hidden="true"></i>
                </a>

                {{-- Heart - i like this --}}
                <a href="{{ route('cart') }}"
                   class="btn btn-link p-0 text-dark position-relative"
                   aria-label="اعجبني هذا">
                    <i class="bi bi-heart fs-5" aria-hidden="true"></i>
                    {{-- Badge عدد  --}}
                    <span class="cart-badge position-absolute top-0 start-100 translate-middle
                                 badge rounded-pill bg-var-heading"
                          aria-label="عدد المنتجات التي اعجبتني">
                        {{ session('cart_count', 0) }}
                    </span>
                </a>
                {{-- Cart --}}
                <a href="{{ route('cart') }}"
                   class="btn btn-link p-0 text-dark position-relative"
                   aria-label="سلة التسوق">
                    <i class="bi bi-bag fs-5" aria-hidden="true"></i>
                    {{-- Badge عدد المنتجات --}}
                    <span class="cart-badge position-absolute top-0 start-100 translate-middle
                                 badge rounded-pill bg-var-heading"
                          aria-label="عدد المنتجات في السلة">
                        {{ session('cart_count', 0) }}
                    </span>
                </a>

            </div>
        </div>
    </div>
</nav>
{{-- resources/views/pages/home.blade.php --}}

@extends('layouts.app')

@section('title', 'الرئيسية — متجرنا')
@section('description', 'تسوق أحدث المنتجات بأفضل الأسعار')

@section('content')

    {{-- ══════════════════════════════════════
        1. HERO SECTION
        @شرح: clamp() بيخلي الفونت responsive
        بدون media queries
    ══════════════════════════════════════ --}}
    <section class="hero position-relative overflow-hidden" aria-label="البانر الرئيسي">
        <div class="hero__bg">
            <img src="{{ asset($hero['image']) }}"
                alt=""
                class="hero__img"
                loading="eager"
                fetchpriority="high">
            <div class="hero__overlay"></div>
        </div>

        <div class="container position-relative z-1">
            <div class="row min-vh-75 align-items-center">
                <div class="col-lg-6 text-white py-5">
                    <h1 class="hero__title fw-bold mb-3">
                        {{ $hero['title'] }}
                    </h1>
                    <p class="hero__subtitle mb-4 opacity-90">
                        {{ $hero['subtitle'] }}
                    </p>
                    <a href="{{ $hero['btnLink'] }}"
                    class="btn btn-primary btn-lg px-5 rounded-pill">
                        {{ $hero['btnText'] }}
                        <i class="bi bi-arrow-left ms-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
        2. FEATURES BAR
        @شرح: Bootstrap g-4 = gap بين الـ cols
        بيتغير responsive أوتوماتيك
    ══════════════════════════════════════ --}}
    <section class="features-bar py-4 bg-white border-bottom" aria-label="مميزاتنا">
        <div class="container">
            <div class="row g-4 justify-content-center text-center">

                @foreach($features as $feature)
                <div class="col-6 col-md-3">
                    <div class="feature-item d-flex flex-column align-items-center gap-2">
                        <i class="bi {{ $feature['icon'] }} fs-2 text-primary" aria-hidden="true"></i>
                        <div>
                            <div class="fw-semibold small">{{ $feature['title'] }}</div>
                            <div class="text-muted" style="font-size:.8rem">{{ $feature['text'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
        3. FEATURED PRODUCTS
        @شرح: col-6 col-md-4 col-lg-3 معناه:
        - موبايل: 2 في الصف (6/12)
        - تابلت: 3 في الصف (4/12)
        - ديسكتوب: 4 في الصف (3/12)
    ══════════════════════════════════════ --}}
    <section class="section-padding" aria-labelledby="featured-title">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="section-title mb-0" id="featured-title">منتجات مميزة</h2>
                <a href="{{ route('products') }}" class="btn btn-outline-primary btn-sm rounded-pill">
                    عرض الكل <i class="bi bi-arrow-left ms-1" aria-hidden="true"></i>
                </a>
            </div>

            <div class="row g-3 g-md-4">
                @forelse($featuredProducts as $product)
                <div class="col-6 col-md-4 col-lg-3">

                    {{-- Product Card --}}
                    <article class="product-card h-100" aria-label="{{ $product['name'] }}">
                        <a href="{{ route('product.show', $product['slug']) }}"
                        class="product-card__img-wrap d-block overflow-hidden rounded-top">
                            <img src="{{ asset($product['image']) }}"
                                alt="{{ $product['name'] }}"
                                class="product-card__img w-100"
                                loading="lazy"
                                width="300"
                                height="300">
                        </a>

                        <div class="product-card__body p-3">
                            <h3 class="product-card__name fs-6 mb-1">
                                <a href="{{ route('product.show', $product['slug']) }}">
                                    {{ $product['name'] }}
                                </a>
                            </h3>
                            <div class="product-card__price fw-bold text-primary">
                                {{ number_format($product['price']) }} ج.م
                            </div>
                            <button class="btn btn-dark btn-sm w-100 mt-2 rounded-pill"
                                    type="button"
                                    aria-label="أضف {{ $product['name'] }} للسلة">
                                <i class="bi bi-bag-plus me-1" aria-hidden="true"></i>
                                أضف للسلة
                            </button>
                        </div>
                    </article>

                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">
                    لا توجد منتجات حالياً
                </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
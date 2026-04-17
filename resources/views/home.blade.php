{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'الرئيسية — المتخصص')
@section('description', 'أقوى عروض الموبايلات والإكسسوارات')

@section('content')

{{-- ══════════════════════ HERO ══════════════════════ --}}
<section class="hero" aria-label="البانر الرئيسي">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-5 order-2 order-lg-1 hero__content">
                <h1 class="hero__title">{{ $hero['title'] }}</h1>
                <p  class="hero__subtitle">{{ $hero['subtitle'] }}</p>
                <a  href="{{ $hero['btnLink'] }}" class="btn hero__btn">
                    {{ $hero['btnText'] }}
                </a>
            </div>
            <div class="col-lg-7 order-1 order-lg-2 text-center">
                {{-- أزرار السلايدر --}}
                <button class="hero__arrow hero__arrow--prev" aria-label="السابق">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <img src="{{ asset($hero['image']) }}"
                     alt="{{ $hero['title'] }}"
                     class="hero__img"
                     loading="eager"
                     fetchpriority="high">
                <button class="hero__arrow hero__arrow--next" aria-label="التالي">
                    <i class="bi bi-chevron-left"></i>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════ BRANDS ══════════════════════ --}}
<section class="brands-bar" aria-label="الماركات">
    <div class="container">
        <div class="brands-bar__track">
            @foreach($brands as $brand)
            <div class="brands-bar__item">
                <img src="{{ asset($brand['img']) }}"
                     alt="{{ $brand['name'] }}"
                     loading="lazy"
                     height="30">
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════ FEATURED PRODUCTS ══════════════════════ --}}
<section class="section-padding" aria-labelledby="featured-title">
    <div class="container">
        <h2 class="section-title text-end mb-4" id="featured-title">الأكثر مبيعاً</h2>
        <div class="products-grid">
            @forelse($featuredProducts as $product)
                @include('components.product-card', ['product' => $product])
            @empty
                <p class="text-muted text-center py-5">لا توجد منتجات</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ══════════════════════ CATEGORIES ══════════════════════ --}}
<section class="section-padding bg-light" aria-labelledby="categories-title">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('products') }}" class="section-more-link">
                <i class="bi bi-arrow-right"></i>
                عرض المزيد
            </a>
            <h2 class="section-title mb-0" id="categories-title">التصنيفات</h2>
        </div>
        <div class="categories-grid">
            @foreach($homeCategories as $cat)
            <a href="{{ route('category.show', $cat['slug']) }}"
               class="category-card"
               aria-label="{{ $cat['name'] }}">
                {{--
                    لما تيجي من الـ DB:
                    <img src="{{ asset('storage/' . $cat['image']) }}" ...>
                --}}
                <img src="{{ asset('images/categories/' . $cat['name'] . '.png') }}"
                     alt="{{ $cat['name'] }}"
                     class="category-card__img"
                     loading="lazy">
                <span class="category-card__name">{{ $cat['name'] }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════ DISCOUNTED PRODUCTS ══════════════════════ --}}
<section class="section-padding" aria-labelledby="discounts-title">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('products') }}" class="section-more-link">
                <i class="bi bi-arrow-right"></i>
                عرض المزيد
            </a>
            <h2 class="section-title mb-0" id="discounts-title">خصومات و عروض</h2>
        </div>
        <div class="products-grid">
            @forelse($discountedProducts as $product)
                @include('components.product-card', ['product' => $product])
            @empty
                <p class="text-muted text-center py-5">لا توجد عروض حالياً</p>
            @endforelse
        </div>
        {{-- Pagination Arrows --}}
        <div class="d-flex justify-content-center gap-2 mt-4">
            <button class="btn btn-outline-secondary btn-sm px-3" aria-label="السابق">
                <i class="bi bi-chevron-right"></i>
            </button>
            <button class="btn btn-outline-secondary btn-sm px-3" aria-label="التالي">
                <i class="bi bi-chevron-left"></i>
            </button>
        </div>
    </div>
</section>

{{-- ══════════════════════ MAINTENANCE OFFERS ══════════════════════ --}}
<section class="section-padding bg-light" aria-labelledby="maintenance-title">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('maintenance') }}" class="section-more-link">
                <i class="bi bi-arrow-right"></i>
                عرض المزيد
            </a>
            <h2 class="section-title mb-0" id="maintenance-title">عروض الصيانة من المتخصص</h2>
        </div>
        <div class="maintenance-grid">
            @php
                /*
                 | أول عنصرين جنب بعض (صغيرين)
                 | العنصر التالت كبير تحتهم
                */
                $topOffers    = array_slice($maintenanceOffers, 0, 2);
                $bottomOffers = array_slice($maintenanceOffers, 2, 1);
            @endphp

            <div class="maintenance-grid__top">
                @foreach($topOffers as $offer)
                <a href="{{ $offer['link'] }}" class="maintenance-card">
                    <img src="{{ asset($offer['image']) }}"
                         alt="{{ $offer['title'] }}"
                         loading="lazy">
                </a>
                @endforeach
            </div>

            @foreach($bottomOffers as $offer)
            <a href="{{ $offer['link'] }}" class="maintenance-card maintenance-card--wide">
                <img src="{{ asset($offer['image']) }}"
                     alt="{{ $offer['title'] }}"
                     loading="lazy">
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════ FEATURES BAR ══════════════════════ --}}
<section class="features-bar" aria-label="مميزاتنا">
    <div class="container">
        <div class="row g-4 text-center">
            @foreach($features as $feature)
            <div class="col-6 col-md-3">
                <div class="feature-item">
                    <i class="bi {{ $feature['icon'] }} feature-item__icon" aria-hidden="true"></i>
                    <div class="feature-item__title">{{ $feature['title'] }}</div>
                    <div class="feature-item__text">{{ $feature['text'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'الرئيسية — المتخصص')
@section('description', 'أقوى عروض الموبايلات والإكسسوارات بأفضل الأسعار')

@section('content')

{{-- ══════════════════════════════
     HERO
══════════════════════════════ --}}
<section class="hero" aria-label="البانر الرئيسي">
    <div class="container h-100">
        <div class="row h-100 align-items-center">

            {{-- النص — يسار في RTL يعني يجي على اليمين ──  --}}
            <div class="col-lg-5 order-2 order-lg-1 hero__content">
                <h1 class="hero__title">{{ $hero['title'] }}</h1>
                <p  class="hero__subtitle">{{ $hero['subtitle'] }}</p>
                <a  href="{{ $hero['btnLink'] }}"
                    class="btn hero__btn">
                    {{ $hero['btnText'] }}
                </a>
            </div>

            {{-- الصورة --}}
            <div class="col-lg-7 order-1 order-lg-2 text-center">
                <img src="{{ asset($hero['image']) }}"
                     alt="{{ $hero['title'] }}"
                     class="hero__img"
                     loading="eager"
                     fetchpriority="high">
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════
     BRANDS BAR
══════════════════════════════ --}}
<section class="brands-bar" aria-label="الماركات">
    <div class="container">
        <div class="brands-bar__track">
            @foreach($brands as $brand)
            <div class="brands-bar__item">
                <img src="{{ asset($brand['img']) }}"
                     alt="{{ $brand['name'] }}"
                     loading="lazy"
                     height="32">
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════
     FEATURED PRODUCTS
     @شرح: forelse أحسن من foreach
     لأن فيه @empty لو مفيش منتجات
══════════════════════════════ --}}
<section class="section-padding" aria-labelledby="featured-heading">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0" id="featured-heading">الأكثر مبيعاً</h2>
            <a href="{{ route('products') }}"
               class="btn btn-outline-primary btn-sm rounded-pill px-4">
                عرض الكل
            </a>
        </div>

        <div class="products-grid">
            @forelse($featuredProducts as $product)

            <article class="product-card" aria-label="{{ $product['name'] }}">

                {{-- Wishlist زرار --}}
                <button class="product-card__wish"
                        type="button"
                        aria-label="أضف للمفضلة">
                    <i class="bi bi-heart" aria-hidden="true"></i>
                </button>

                {{-- صورة المنتج --}}
                <a href="{{ route('product.show', $product['slug']) }}"
                   class="product-card__img-wrap">
                    <img src="{{ asset($product['image']) }}"
                         alt="{{ $product['name'] }}"
                         class="product-card__img"
                         loading="lazy"
                         width="260"
                         height="260">
                </a>

                {{-- بيانات المنتج --}}
                <div class="product-card__body">
                    <h3 class="product-card__name">
                        <a href="{{ route('product.show', $product['slug']) }}">
                            {{ $product['name'] }}
                        </a>
                    </h3>

                    <div class="product-card__price">
                        {{ number_format($product['price']) }}.000 جنية
                    </div>

                    <div class="product-card__actions">
                        <button class="btn product-card__add-btn"
                                type="button"
                                aria-label="أضف {{ $product['name'] }} للسلة">
                            <i class="bi bi-bag" aria-hidden="true"></i>
                            أضف الى السلة
                        </button>
                        <button class="btn product-card__wish-btn"
                                type="button"
                                aria-label="أضف للمفضلة">
                            <i class="bi bi-heart" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </article>

            @empty
            <p class="text-center text-muted py-5 col-span-full">
                لا توجد منتجات حالياً
            </p>
            @endforelse
        </div>

    </div>
</section>

@endsection
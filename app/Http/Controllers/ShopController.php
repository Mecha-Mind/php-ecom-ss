<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    // ── بيانات مشتركة بين كل الصفحات ──
    // في الـ production هتيجي من الـ DB
    private function sharedData(): array
    {
        return [
            'categories' => [
                [
                    'name'     => 'الملابس',
                    'slug'     => 'clothing',
                    'children' => [
                        ['name' => 'تيشيرتات', 'slug' => 'tshirts'],
                        ['name' => 'بناطيل',   'slug' => 'pants'],
                    ],
                ],
                [
                    'name'     => 'الإلكترونيات',
                    'slug'     => 'electronics',
                    'children' => [
                        ['name' => 'موبايلات', 'slug' => 'phones'],
                        ['name' => 'لابتوبات', 'slug' => 'laptops'],
                    ],
                ],
                ['name' => 'الكتب',  'slug' => 'books',  'children' => []],
                ['name' => 'العروض', 'slug' => 'offers', 'children' => []],
            ],
            'branchName' => 'الفرع الرئيسي',
            'phone'      => '01000000000',
        ];
    }

    public function home()
    {
        $data = $this->sharedData();

        // بيانات الهوم بيدج
        $data['hero'] = [
            'title'    => 'أقوى عروض التخفيض على الموبايلات',
            'subtitle' => 'أسعار مميزة وتخفيضات كبيرة خلال شهر اكتوبر على أفضل الموبيلات, الساعات, السماعات, الجرابات و الإكسسوارات.',
            'image'    => 'images/hero.png',
            'btnText'  => 'تسوق الآن',
            'btnLink'  => route('products'),
        ];

        $data['featuredProducts'] = [
            ['id'=>1,'name'=>'منتج 1','price'=>299,'image'=>'images/p1.png','slug'=>'product-1'],
            ['id'=>2,'name'=>'منتج 2','price'=>499,'image'=>'images/p2.png','slug'=>'product-2'],
            ['id'=>3,'name'=>'منتج 3','price'=>199,'image'=>'images/p3.png','slug'=>'product-3'],
            ['id'=>4,'name'=>'منتج 4','price'=>399,'image'=>'images/p4.png','slug'=>'product-4'],
        ];

        $data['features'] = [
            ['icon'=>'bi-truck',          'title'=>'توصيل سريع',    'text'=>'خلال 24 ساعة'],
            ['icon'=>'bi-arrow-clockwise','title'=>'إرجاع مجاني',   'text'=>'خلال 14 يوم'],
            ['icon'=>'bi-shield-check',   'title'=>'دفع آمن',       'text'=>'100% مضمون'],
            ['icon'=>'bi-headset',        'title'=>'دعم 24/7',      'text'=>'نخدمك دايماً'],
        ];

        return view('home', $data);
    }

    public function products()
    {
        $data = $this->sharedData();
        $data['products'] = []; // هتيجي من الـ DB
        return view('pages.products', $data);
    }

    public function category(string $slug)
    {
        $data = $this->sharedData();
        $data['slug'] = $slug;
        // $data['category'] = Category::where('slug', $slug)->firstOrFail();
        return view('pages.category', $data);
    }

    public function product(string $slug)
    {
        $data = $this->sharedData();
        $data['slug'] = $slug;
        return view('pages.product', $data);
    }

    public function cart()
    {
        return view('pages.cart', $this->sharedData());
    }

    public function checkout()
    {
        return view('pages.checkout', $this->sharedData());
    }

    public function account()
    {
        return view('pages.account', $this->sharedData());
    }

    public function orders()
    {
        return view('pages.orders', $this->sharedData());
    }

    public function orderDetail(string $id)
    {
        $data = $this->sharedData();
        $data['orderId'] = $id;
        return view('pages.order-detail', $data);
    }
}

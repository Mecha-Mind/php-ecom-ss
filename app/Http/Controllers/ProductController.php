<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

/**
 * <?php
// app/Http/Controllers/ShopController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
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

            // ── Footer Data ──
            'footer' => [
                'logo'    => 'images/logo.png',
                'address' => 'القاهرة، مصر — شارع التحرير',
                'phone'   => '01000000000',
                'email'   => 'info@store.com',
                'social'  => [
                    ['icon' => 'bi-facebook',  'url' => '#', 'label' => 'فيسبوك'],
                    ['icon' => 'bi-instagram', 'url' => '#', 'label' => 'إنستجرام'],
                    ['icon' => 'bi-twitter-x', 'url' => '#', 'label' => 'تويتر'],
                    ['icon' => 'bi-youtube',   'url' => '#', 'label' => 'يوتيوب'],
                ],
                'info_links' => [
                    ['name' => 'من نحن',       'route' => 'about'],
                    ['name' => 'تواصل معنا',   'route' => 'contact'],
                    ['name' => 'سياسة الخصوصية', 'route' => 'about'],
                    ['name' => 'الشروط والأحكام', 'route' => 'about'],
                ],
            ],
        ];
    }

    public function home()
    {
        $data = $this->sharedData();

        $data['hero'] = [
            'title'    => 'أقوى عروض التخفيض على الموبايلات',
            'subtitle' => 'أسعار مميزة وتخفيضات كبيرة خلال شهر اكتوبر على أفضل الموبيلات، الساعات، السماعات، الجرابات والإكسسوارات.',
            'image'    => 'images/hero.png', // ← صورة من public/images
            'btnText'  => 'تسوق الآن',
            'btnLink'  => route('products'),
        ];

        $data['brands'] = [
            // name للـ alt و img للصورة من public/images
            ['name' => 'Anker',   'img' => 'images/brands/anker.png'],
            ['name' => 'Samsung', 'img' => 'images/brands/samsung.png'],
            ['name' => 'Realme',  'img' => 'images/brands/realme.png'],
            ['name' => 'Infinix', 'img' => 'images/brands/infinix.png'],
            ['name' => 'Xiaomi',  'img' => 'images/brands/xiaomi.png'],
            ['name' => 'Apple',   'img' => 'images/brands/apple.png'],
        ];

        /*
         | ── لما تيجي من الـ DB هيبقى كده ──
         | $data['featuredProducts'] = Product::with('images')
         |     ->where('is_featured', true)
         |     ->latest()
         |     ->take(8)
         |     ->get()
         |     ->map(fn($p) => [
         |         'id'    => $p->id,
         |         'name'  => $p->name,
         |         'price' => $p->price,
         |         'image' => $p->images->first()?->path ?? 'images/placeholder.png',
         |         'slug'  => $p->slug,
         |     ])->toArray();
         
        $data['featuredProducts'] = [
            ['id'=>1,'name'=>'ايفون 13 برو ماكس 256 جيجا بايت، تيتانيوم، صحراوي G5 نسخة الشرق الأوسط','price'=>35000,'image'=>'images/p1.png','slug'=>'product-1'],
            ['id'=>2,'name'=>'ايفون 13 برو ماكس 256 جيجا بايت، تيتانيوم، صحراوي G5 نسخة الشرق الأوسط','price'=>35000,'image'=>'images/p2.png','slug'=>'product-2'],
            ['id'=>3,'name'=>'ايفون 13 برو ماكس 256 جيجا بايت، تيتانيوم، صحراوي G5 نسخة الشرق الأوسط','price'=>35000,'image'=>'images/p3.png','slug'=>'product-3'],
            ['id'=>4,'name'=>'ايفون 13 برو ماكس 256 جيجا بايت، تيتانيوم، صحراوي G5 نسخة الشرق الأوسط','price'=>35000,'image'=>'images/p4.png','slug'=>'product-4'],
        ];

        $data['features'] = [
            ['icon'=>'bi-truck',          'title'=>'توصيل سريع',  'text'=>'خلال 24 ساعة'],
            ['icon'=>'bi-arrow-clockwise','title'=>'إرجاع مجاني', 'text'=>'خلال 14 يوم'],
            ['icon'=>'bi-shield-check',   'title'=>'دفع آمن',     'text'=>'100% مضمون'],
            ['icon'=>'bi-headset',        'title'=>'دعم 24/7',    'text'=>'نخدمك دايماً'],
        ];

        return view('home', $data);
    }

    public function products()
    {
        $data = $this->sharedData();
        $data['products'] = [];
        return view('pages.products', $data);
    }

    public function category(string $slug)
    {
        $data = $this->sharedData();
        $data['slug'] = $slug;
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
        $data         = $this->sharedData();
        $data['orderId'] = $id;
        return view('pages.order-detail', $data);
    }
}*/
 */
class ProductController extends Controller
{



    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.products', compact('product'));
    }

    public function popular()
    {
        $products = Product::orderBy('views', 'desc')->take(10)->get();
        return view('pages.popular', compact('products'));
    }
    public function recent()
    {
        $products = Product::latest('views', 'desc')->take(5)->get();
        return view('pages.recent', compact('products'));
    }

}

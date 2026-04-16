<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // app/Http/Controllers/PageController.php
public function index()
{
    // في الـ production هتجيبها من الـ Database
    // $categories = Category::with('children')->whereNull('parent_id')->get();
    
    // دلوقتي للتجربة، بيانات ثابتة بنفس الشكل
    $categories = [
        [
            'name'     => 'الملابس',
            'slug'     => 'clothing',
            'children' => [
                ['name' => 'تيشيرتات', 'slug' => 'tshirts'],
                ['name' => 'بناطيل',   'slug' => 'pants'],
                ['name' => 'جاكيتات',  'slug' => 'jackets'],
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
        [
            'name'     => 'الكتب',
            'slug'     => 'books',
            'children' => [], // مفيش submenu
        ],
        [
            'name'     => 'العروض',
            'slug'     => 'offers',
            'children' => [],
        ],
    ];

    return view('home', compact('categories'));
}
}

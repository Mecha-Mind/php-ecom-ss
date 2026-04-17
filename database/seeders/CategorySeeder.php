<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $cats = Category::insert([
            ['category_name' => 'قطع غيار', 'category_displaystatus' => 1],
            ['category_name' => 'موبايلات', 'category_displaystatus' => 1],
            ['category_name' => 'إكسسوارات', 'category_displaystatus' => 1],
            ['category_name' => 'ساعات', 'category_displaystatus' => 1],
        ]);

        SubCategory::insert([
            ['subcategory_name' => 'شاشات', 'category_id' => 1],
            ['subcategory_name' => 'بطاريات', 'category_id' => 1],
            ['subcategory_name' => 'ايفون', 'category_id' => 2],
            ['subcategory_name' => 'سامسونج', 'category_id' => 2],
            ['subcategory_name' => 'جرابات', 'category_id' => 3],
        ]);
    }
}
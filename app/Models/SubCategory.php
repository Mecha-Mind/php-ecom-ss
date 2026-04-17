<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';     // ← مهم جداً
    protected $primaryKey = 'subcategory_id';
    
    protected $fillable = [
        'subcategory_name', 
        'subcategory_displaystatus', 
        'category_id'
    ];
}
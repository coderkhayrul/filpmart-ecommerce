<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'pro_category_id', 'pro_cat_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id','brand_id');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'product_creator');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'pro_category_id');
    }
}

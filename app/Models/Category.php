<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cat_parent(){
        return $this->belongsTo(Category::class, 'pro_cat_parent', 'pro_cat_id');
    }
}

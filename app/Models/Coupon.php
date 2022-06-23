<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_title',
        'coupon_code',
        'coupon_amount',
        'coupon_starting',
        'coupon_ending',
        'coupon_remarks',
        'coupon_creator',
        'coupon_editor',
        'coupon_slug',
        'coupon_status',
    ];
}

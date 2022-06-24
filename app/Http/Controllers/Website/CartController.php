<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $allcart = Cart::getContent();
        return view('website.shopping_cart', compact('allcart'));
    }

    public function store($slug)
    {
        $product = Product::where('product_status', 1)->where('product_slug', $slug)->firstOrFail();
        Cart::add([
            'id' => $product->product_id,
            'name' => $product->product_name,
            'price' => $product->product_discount_price,
            'quantity' => 1,
            'attributes' => [
                'product_image' => $product->product_image
            ]
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function coupon_apply(Request $request){


        $coupons = Coupon::where('coupon_status', 1)->get();
        return $coupons;
        foreach ($coupons as $coupon) {
            if ($coupon->coupon_code == $request->coupon_code) {
                if ($coupon->coupon_ending < date('Y-m-d', strtotime(Carbon::now()))) {
                    return "Coupon Expired";
                }else{
                    return "Coupon Active";
                }
            }else {
                return "Coupon Not Found!";
            }
        }


        // $coupon = Coupon::where('coupon_status', 1)->where('coupon_code', $request->coupon_code)->first();


        // if ($coupon->coupon_ending < date('Y-m-d', strtotime(Carbon::now()))) {
        //     return "Coupon Expired";
        // }else{
        //     return "Coupon Active";
        // }

        // @if (date('d-M-Y', strtotime(Carbon\Carbon::now())) <= date('d-M-Y', strtotime($data->coupon_exp_date)))
        //                         <span class="badge badge-success">{{  date('d-M-Y', strtotime($data->coupon_exp_date)) }}</span>
        //                         @else
        //                         <span class="badge badge-danger">Coupon Expire</span>
        //                         @endif
    }

}

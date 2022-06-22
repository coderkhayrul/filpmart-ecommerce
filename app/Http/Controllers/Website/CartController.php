<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
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
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('wishlist_status', 1)->get();
        return view('website.wishlist', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $product = Product::where('product_status', 1)->where('product_slug', $slug)->first();
        $wishlist = new Wishlist();
        $wishlist->product_id = $product->product_id;
        $wishlist->save();
        return redirect()->back();
    }

    public function destroy($slug){
        $product = Product::where('product_status', 1)->where('product_slug', $slug)->firstOrFail();
        Wishlist::where('wishlist_status', 1)->where('product_id', $product->product_id)->delete();
        return redirect()->back();
    }

}

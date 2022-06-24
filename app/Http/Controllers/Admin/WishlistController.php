<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('wishlist_status', 1)->where('user_id', auth()->user()->id)->get();
        return view('website.wishlist', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, $slug)
    {
        if (Auth::check()) {
            $product = Product::where('product_status', 1)->where('product_slug', $slug)->first();
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::user()->id;
            $wishlist->product_id = $product->product_id;
            $wishlist->save();
            return redirect()->back()->with('success', 'Added to wishlist');
        } else {
            return redirect()->back()->with('error', 'Please login to add to wishlist');
        }
    }

    public function destroy($slug){
        $product = Product::where('product_status', 1)->where('product_slug', $slug)->firstOrFail();
        Wishlist::where('wishlist_status', 1)->where('product_id', $product->product_id)->delete();
        return redirect()->back();
    }

}

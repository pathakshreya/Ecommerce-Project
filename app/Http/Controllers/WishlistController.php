<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist(){
        
        $wishlists = Wishlist::all();
        $product=Products::all();
        $category = Category::all();
        //$wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlists', 'product','category'));
    }

    public function addwishlist(Request $request, $id){
        $products = Products::find($id);
        $category = Category::find($id);
        $wishlist = new Wishlist;
        $wishlist->product_name = $products->name;
        $wishlist->price = $products->selling_price;

        if($request->has('image') && $request->file('image')->isValid()){
            $category->addMediaFronRequest('image')->ToMediaCollection('images');
        }
        $wishlist->save();
        return redirect()->back()->with('status','Product successfully added to wishlist.');
        }
  

    public function deletewishlist($id){
         $wishlist = Wishlist::find($id);
         $wishlist->delete();
         return redirect()->route('wishlist')->with('status','Wishlist removed successfully.');
    }

    public function wishlistcount(){
        $wishcount= Wishlist::count();
        return response()->json(['count'=> $wishcount]);
    }
}

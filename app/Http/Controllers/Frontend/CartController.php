<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Addcart;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        $addcarts = Addcart::with('product')->get();
       // dd($addcarts->all());
        $category = Category::all();
        $product = Products::all();
        return view('frontend.addcart', compact('addcarts', 'category', 'product'));
    }
    // }
    //     if (Auth::id()){
    //         return redirect()->back();
    //     }
    //     else{
    //         return redirect('/login');
    //     }
    //     //return view('frontend.addcart');
    // }
    public function addcart(Request $request, $id){
       
        $products=Products::find($id);
       $category=Category::find($id);
        $addcarts = new Addcart;
        $addcarts->product_name = $products->name;
        $addcarts->quantity = $request->quantity;
        $addcarts->price = $products->selling_price;
       $addcarts->subtotal = $request->subtotal;

        
       if($request->has('image') && $request->file('image')->isValid()){
        $category->addMediaFromRequest('image')->ToMediaCollection('images');
    }
       
        $addcarts->save();
        return redirect()->back()->with('status', 'Product successfully added to cart.');
    }

    public function deletecart($id){
        $addcarts = Addcart::find($id);
        $addcarts->delete();
        return redirect()->back()->with('status','Product successfully removed from cart');
    }

    public function cartcount(){
        $cartcount = AddCart::count();
        return response()->json(['count'=> $cartcount]);
    }
}

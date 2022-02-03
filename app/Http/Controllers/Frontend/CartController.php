<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Addcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        $addcarts = Addcart::all();
        return view('frontend.addcart', compact('addcarts'));
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
        $addcarts = new Addcart;
        $addcarts->name = $request->name;
        $addcarts->product_name = $request->product_name;
        $addcarts->quantity = $request->quantity;
        $addcarts->price = $request->price;
        $addcarts->subtotal = $request->subtotal;
        $addcarts->save();
        return redirect()->back()->with('status', 'Product successfully added to cart.');
    }

    public function deletecart($id){
        $addcarts = Addcart::find($id);
        $addcarts->delete();
        return redirect()->back()->with('status','Product successfully removed from cart');
    }
}

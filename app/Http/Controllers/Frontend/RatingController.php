<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addrating(Request $request){
             $stars_rated = $request->input('product_rating');
             $product_id = $request->input('product_id');

             $product_check = Products::where('id', $product_id)->where('status','0')->first();
             if($product_check){
                 $verified_purchase = Order::ehere('orders.user_id',Auth::id())
                 ->join('order_items','orders.id','order_items.order_id')
                 ->where('order_items.prod_id', $product_id)->get();

                 if($verified_purchase)
                 {
                     $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->exists();
                     if($existing_rating)
                     {
                         $existing_rating->stars_rated = $stars_rated;
                         $existing_rating->update();
                    }
                    else{
                    Rating::create([
                        'user_id'=>Auth::id(),
                        'prod_id'=>$product_id,
                        'star_rated'=>$stars_rated

                    ]);
                }

                return redirect()->back()->with('status','Thankyou for rating');
                 }
                 else{
                     return redirect()->back()->with('status', 'cant rate without purchase');
                 }
                }
                else{
                    return redirect()->back()->with('status', 'Link was broken');
                }
             }

    }


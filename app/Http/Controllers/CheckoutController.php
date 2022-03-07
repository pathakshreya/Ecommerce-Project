<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addcart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    public function index(){
        $addcarts = Addcart::all();
        return view('frontend.checkout', compact('addcarts'));
    }

    public function placeorder(Order $order ,Request $request){
        //dd($request->all());
        $order = new Order;
        $order_items = OrderItem::all();
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address1;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pincode = $request->pincode;
        $order->message = $request->message;
        $order->tracking_no = 'pathak'.rand(1111,9999);
        $order->save();
        $cartitems = AddCart::get();
        return redirect()->back()->with('status', 'Your order has been placed successfully.');

        foreach($cartitems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'quantity'=> $item->prod_qty,
                'price'=> $item->products->selling_price,
            ]);
        }
      
    }

    public function vieworder(){
        return view('frontend.view-order');
    }

}

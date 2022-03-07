<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function delete($id){
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->back()->with('status','Customer order has been removed successfully.');
    }

}

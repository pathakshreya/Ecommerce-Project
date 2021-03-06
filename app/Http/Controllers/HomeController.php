<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $featured_products = Products::all();
        // $trending_category = Category::all();
        return view('home');
        //return view('product.index', compact('featured_products', 'trending_category'));
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}

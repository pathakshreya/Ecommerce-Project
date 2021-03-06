<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Addcart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_products = Products::where('trending','1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category'));
    }

    public function category()
    {
        $category = Category::where('status','0')->get();
       return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug, Request $request){    
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products=Products::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category','products'));
        }
        else{
            return redirect('/')->with('status','Slug doesnot exists.');
        }
    }

    public function productview($cate_slug, $prod_slug){
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Products::where('slug', $prod_slug)->exists())
            {
               $products = Products::where('slug', $prod_slug)->first();
               return view('frontend.products.view', compact('products'));
            }
            else{
                return redirect('/')->with('status', 'Slug was broken.');
            }
        }
            else{
                return redirect('/')->with('status', 'Slug doesnot exists.');
            }

        }
        public function search(Request $request){
               $product = Products::
               where('name', 'like', '%'. $request->input('search_product').'%')
               ->get();

               return view('frontend.search',['products'=>$product]);
        }

        public function searchproduct($slug)
        {
          $categories = Category::find($slug);
         return view('frontend.products.view', compact('categories'));
        }
           

}

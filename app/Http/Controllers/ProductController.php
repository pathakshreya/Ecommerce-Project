<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $product=new Products;
         $product->category_id=$request->category_id;
         $product->name=$request->name;
         $product->slug=$request->slug;
         $product->small_description=$request->small_description;
        $product->description=$request->description;
        $product->original_price=$request->original_price;
        $product->selling_price=$request->selling_price;
        $product->quantity=$request->quantity;
        $product->tax=$request->tax;
        $product->status=$request->input('status') == TRUE ? '1':'0';
        $product->trending=$request->input('trending') == TRUE ? '1':'0';
        $product->meta_title=$request->meta_title;
        $product->meta_keyword=$request->meta_keyword;
        $product->meta_description=$request->meta_description;
        
        if($request->has('image') && $request->file('image')->isValid()){
            $product->addMediaFromRequest('image')->ToMediaCollection('images');
        }

        $product->save();
        return redirect('/product')->with('status', 'Products has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Products::find($id);
        return view('admin.product.edit-product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->small_description=$request->small_description;
       $product->description=$request->description;
       $product->original_price=$request->original_price;
       $product->selling_price=$request->selling_price;
       $product->quantity=$request->quantity;
       $product->tax=$request->tax;
       $product->status=$request->input('status') == TRUE ? '1':'0';
       $product->trending=$request->input('trending') == TRUE ? '1':'0';
       $product->meta_title=$request->meta_title;
       $product->meta_keyword=$request->meta_keyword;
       $product->meta_description=$request->meta_description;
       
       $product->update();

       if($product){
           if($request->hasFile('image')){
              $product->clearMediaCollection('images');
              $product->addMediaFromRequest('image')->ToMediaCollection('images');
           }
       }
       return redirect('/product')->with('status','Products updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Products::find($id);
        $products->delete();
        return redirect()->back()->with('status','Product has been deleted successfully.');
    }
}

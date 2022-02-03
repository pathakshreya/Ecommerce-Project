<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException; 



class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('media')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function addCategory(){
        return view('admin.category.addcategory');
    }

    public function insertCategory(Request $request){
        //dd($request->all());
        // $validated = $request->validate([
        //     'name'=>'required',
        //     'slug'=>'required',
        //     'description'=>'required',
        //     'status'=>'required',
        //     'popular'=>'required',
        //     'image'=>'required',
        //     'meta_title'=>'required',
        //     'meta_description'=>'required',
        //     'meta_keyword'=>'required',
        // ]);
        $category= new Category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status=$request->input('status') == TRUE ? '1':'0';
        $category->popular=$request->input('popular') == TRUE ? '1':'0';
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        
        if($request->hasFile('image') && $request->file('image')->isValid()){
           $category->addMediaFromRequest('image')->toMediaCollection('images');
        }
       
        $category->save();
        return redirect('/categories')->with('status', 'Category Added successfully.');
        
    }

    public function editCategory(Category $category, $id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->input('status') == "TRUE" ? '1':'0';
        $category->popular = $request->input('popular') == "TRUE" ? '1':'0';
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        
        $category->save();

        if($category){
            if($request->hasFile('image')){
                $category->clearMediaCollection('images');
                $category->addMediaFromRequest('image')->ToMediaCollection('images');
            }
        }
        return redirect('/categories')->with('status', 'Category Updated successfully.');
        
    }

    public function deleteCategory($id){
        $categories= Category::find($id);
        $categories->delete();
        return redirect()->back()->with('status', 'Category deleted successfully.');
    }
}

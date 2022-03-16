<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rating;

class RateController extends Controller
{
    public function viewrating(){
        $users = User::all();
        $users = User::where('role_as', 0)->get();
        $ratings = Rating::all();
        return view('admin.userrating', compact('users','ratings'));
    }
    public function delete($id){
        $ratings = Rating::find($id);
        $ratings->delete();
        return redirect()->back()->with('status', 'Rating has been deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewuser(){
        $users = User::where('role_as', 0)->get();
        return view('admin.user.index', compact('users'));
    }
    public function viewdetail($id)
    {
        $users = User::find($id);
        return view('admin.user.view', compact('users'));
    }
}

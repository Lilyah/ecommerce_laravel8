<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // Load Home Page
    public function index(){
        return view('frontend.index');
    }

    // User Logout
    public function UserLogout(){
        Auth::logout(); // logout is default method
        return redirect()->route('login');
    }
}

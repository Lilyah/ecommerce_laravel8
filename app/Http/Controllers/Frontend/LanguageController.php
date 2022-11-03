<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // English
    public function English(){
        session()->get('language');
        session()->forget('language'); //forget the previous language id

        Session::put('language', 'english'); // comes from resources/views/frontend/body/header.blade.php  @if (session()->get('language') == 'english')

        return redirect()->back();
    }

    // Bulgarian
    public function Bulgarian(){
        session()->get('language');
        session()->forget('language'); //forget the previous language id

        Session::put('language', 'bulgarian'); // comes from resources/views/frontend/body/header.blade.php  @if (session()->get('language') == 'bulgarian')

        return redirect()->back();
    }
}

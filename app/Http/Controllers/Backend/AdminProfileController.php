<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    // View Admin Profile function
    public function AdminProfile(){
        $adminData = Admin::find(1); // id = 1
        return view('admin.admin_profile_view', compact('adminData'));
    }
}

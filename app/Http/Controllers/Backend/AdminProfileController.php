<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{

    /**
     * TODO: I don't like the simplicity of this method, it has to find the loged in admin, not only the first record from the DB 
     */
    // View Admin Profile function
    public function AdminProfile(){
        $adminData = Admin::find(1); // id = 1
        return view('admin.admin_profile_view', compact('adminData'));
    }

    /**
     * TODO: I don't like the simplicity of this method, it has to find the loged in admin, not only the first record from the DB 
     */
    // Admin Profile Edit
    public function AdminProfileEdit(){
        $editData = Admin::find(1); // id = 1
        return view('admin.admin_profile_edit', compact('editData'));
    }

    /**
     * TODO: I don't like the simplicity of this method, it has to find the loged in admin, not only the first record from the DB 
     */
    // Admin Profile Store
    public function AdminProfileStore(Request $request){
        $data = Admin::find(1); // finding the exact admin id in the db
        $data->name = $request->name;
        $data->email = $request->email;

        // Handling the image (if there is one)
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');

            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path)); // unlink the old image

            $fileName = date('YmdHi').$file->getClientOriginalName(); // generating unique name
            $file->move(public_path('upload/admin_images'), $fileName); // moving the new image in public/upload/admin_images
            $data['profile_photo_path'] = $fileName; // saving it into the db

        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile uptaded successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    }


    // Admin Profile Change Password
    public function AdminChangePassword(){
        return view('admin.admin_change_password');

    }


    // Admin Profile Update Password
    public function AdminUpdatePassword(Request $request){
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;

        if(Hash::check($request->old_password, $hashedPassword)){ // check if the old password matches
                $admin = Admin::find(1);
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::logout();

                return redirect()->route('admin.logout');
            } else {
                return redirect()->back();
        }
    
    }






}

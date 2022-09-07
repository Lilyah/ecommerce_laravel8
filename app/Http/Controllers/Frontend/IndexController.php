<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    // User Profile
    public function UserProfile(){
        $id = Auth::user()->id; // Getting the loged in user id
        $user = User::find($id); // All the data for this specific user

        return view('frontend.profile.user_profile', compact('user'));
    }

    // User Profile Store
    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id); // finding the exact user id in the db
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        // Handling the image (if there is one)
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');

           @unlink(public_path('upload/user_images/'.$data->profile_photo_path)); // unlink the old image

            $fileName = date('YmdHi').$file->getClientOriginalName(); // generating unique name
            $file->move(public_path('upload/user_images'), $fileName); // moving the new image in public/upload/user_images
            $data['profile_photo_path'] = $fileName; // saving it into the db

        }

        $data->save();

        $notification = array(
            'message' => 'User Profile uptaded successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }
}

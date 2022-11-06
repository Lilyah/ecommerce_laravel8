<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\SubSubCategories;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    // Load Home Page
    public function index(){
        $categories = Categories::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->get(); // getting active sliders

        return view('frontend.index', compact(
            'categories',
            'sliders',
        ));
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

    // User Change Password View
    public function UserChangePassword(){
        $id = Auth::user()->id; // Getting the loged in user id
        $user = User::find($id); // All the data for this specific user

        return view('frontend.profile.change_password', compact('user'));
    }

    // User Change Password Store
    public function UserChangePasswordStore(Request $request){

        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password; // Getting the password of the loged in user

        if(Hash::check($request->old_password, $hashedPassword)){ // check if the old password matches
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();

                return redirect()->route('user.logout');
            } else {
                return redirect()->back();
            };
    }
}

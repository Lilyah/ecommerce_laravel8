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
use App\Models\Products;
use App\Models\MultiImg;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    // Load Home Page
    public function index(){
        $categories_all = Categories::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->get(); // getting active sliders
        $products = Products::where('status', 1)->orderBy('created_at', 'DESC')->get(); // getting active products 
        $featured = Products::where('featured', 1)->orderBy('created_at', 'DESC')->get(); // getting featured products 
        $hot_deals = Products::where('hot_deals', 1)->orderBy('created_at', 'DESC')->get(); // getting hot deals products 
        $special_offer = Products::where('special_offer', 1)->orderBy('created_at', 'DESC')->get(); // getting special offer products 
        $special_deals = Products::where('special_deals', 1)->orderBy('created_at', 'DESC')->get(); // getting special deals products 

        // Retrieve all categories that have at least one product
        // For has('products') you need the relationship categories-products in Categories model
        $categories = Categories::has('products')->orderBy('category_name_en', 'ASC')->get();

        return view('frontend.index', compact(
            'categories',
            'categories_all',
            'sliders',
            'products',
            'featured',
            'hot_deals',
            'special_offer',
            'special_deals',
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

    // Product Details
    public function ProductDetails($id,$slug_en){
        $product = Products::findOrFail($id);
        $multiimages = MultiImg::where('product_id',$id)->get(); // when the id from column 'product_id' is matching the product id

        return view('frontend.products.product_details', compact(
            'product',
            'multiimages',
        ));
    }
}

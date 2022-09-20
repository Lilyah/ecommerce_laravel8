<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Image;
use Illuminate\Support\Carbon;

class BrandsController extends Controller
{
    // Admin All Brands View
    public function BrandsView(){
        $brands = Brands::latest()->get(); //getting all data from the DB
        return view('backend.brands.brands_view', compact('brands'));
    }

    // Admin Add New Brand
    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bg' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name_en.required' => 'The field for english brand name is required',
            'brand_name_bg.required' => 'The field for bulgarian brand name is required',
            'brand_image.required' => 'The field for brand image is required',
        ]);

        $image = $request->file('brand_image'); // passiing the file
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brands/'.$name_gen);
        $save_url = 'upload/brands/'.$name_gen;

        Brands::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bg' => $request->brand_name_bg,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)), // the space will be replaced by -
            'brand_slug_bg' => strtolower(str_replace(' ', '-', $request->brand_name_bg)),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'New Brand added successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Admin Edit Brand
    public function BrandEdit($id){
        $brand = Brands::findOrFail($id);
        return view('backend.brands.brand_edit', compact('brand'));
    }

    // Admin Update Brand
    public function BrandUpdate(Request $request){
        $brand_id = $request->id; // it's commit grom brand_edint.blade.php <input type="hidden" HERE>>>>name="id"<<<<<< value="{{ $brand->id }}">

        $old_image = $request->old_image; // it's commig from brand_edit.blade.php <input type="hidden" HERE>>>>name="old_image"<<<<<< value="{{ $brand->brand_image }}">

        if ($request->file('brand_image')){ // with image
            $request->validate([
                'brand_name_en' => 'required',
                'brand_name_bg' => 'required',
                'brand_image' => 'required',
            ], [
                'brand_name_en.required' => 'The field for english brand name is required',
                'brand_name_bg.required' => 'The field for bulgarian brand name is required',
                'brand_image.required' => 'The field for brand image is required',
            ]);

            unlink($old_image);

            $image = $request->file('brand_image'); // passiing the file
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brands/'.$name_gen);
            $save_url = 'upload/brands/'.$name_gen;

            Brands::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bg' => $request->brand_name_bg,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)), // the space will be replaced by -
                'brand_slug_bg' => strtolower(str_replace(' ', '-', $request->brand_name_bg)),
                'brand_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Brand Updated successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.brands')->with($notification);        

        } else { //without image
            $request->validate([
                'brand_name_en' => 'required',
                'brand_name_bg' => 'required',
            ], [
                'brand_name_en.required' => 'The field for english brand name is required',
                'brand_name_bg.required' => 'The field for bulgarian brand name is required',
            ]);

            Brands::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bg' => $request->brand_name_bg,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)), // the space will be replaced by -
                'brand_slug_bg' => strtolower(str_replace(' ', '-', $request->brand_name_bg)),
                'updated_at' => Carbon::now(),
            ]);
    
            $notification = array(
                'message' => 'Brand Updated successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.brands')->with($notification);        
        }

    }


    // Admin Delete Brand
    public function BrandDelete($id){
        $brand = Brands::findOrFail($id);
        $brand_image = $brand->brand_image;

        unlink($brand_image); // deleting the image from the folder

        Brands::findOrFail($id)->delete(); // deleting the data from the db

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brands')->with($notification);   


    }



}

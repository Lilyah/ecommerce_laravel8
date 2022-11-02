<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
use App\Models\Slider;

class SliderController extends Controller
{

    // Admin View Slider
    public function SliderView(){
        $slider = Slider::latest()->get();
        return view('backend.slider.slider_view', compact(
            'slider',
        ));
    }


    // Admin Add New Slider
    public function SliderStore(Request $request){
        $request->validate([
            'slider_image' => 'required',
        ], [
            'brand_image.required' => 'The field for slider image is required',
        ]);
    
        $image = $request->file('slider_image'); // passiing the file
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;
    
        Slider::insert([
            'title_en' => $request->title_en,
            'title_bg' => $request->title_bg,
            'slider_slug_en' => strtolower(str_replace(' ', '-', $request->title_en)), // the space will be replaced by -
            'slider_slug_bg' => strtolower(str_replace(' ', '-', $request->title_bg)),
            'description_en' => $request->description_en,
            'description_bg' => $request->description_bg,
            'slider_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
    
        $notification = array(
            'message' => 'New Slider Image added successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }

    // Admin Edit Slider
    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));
    }

    // Admin Update Slider
    public function SliderUpdate(Request $request){
        $slider_id = $request->id; // it's commit grom slider_edit.blade.php <input type="hidden" HERE>>>>name="id"<<<<<< value="{{ $slider->id }}">
    
        $old_image = $request->old_image; // it's commig from slider_edit.blade.php <input type="hidden" HERE>>>>name="old_image"<<<<<< value="{{ $slider->slider_image }}">
    
        if ($request->file('slider_image')){ // with image
            $request->validate([
                'slider_image' => 'required',
            ], [
                'slider_image.required' => 'The field for slider image is required',
            ]);
    
            unlink($old_image);
    
            $image = $request->file('slider_image'); // passiing the file
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
    
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_bg' => $request->title_bg,
                'slider_slug_en' => strtolower(str_replace(' ', '-', $request->title_en)), // the space will be replaced by -
                'slider_slug_bg' => strtolower(str_replace(' ', '-', $request->title_bg)),
                'description_en' => $request->description_en,
                'description_bg' => $request->description_bg,
                'slider_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        
            $notification = array(
                'message' => 'Slider Updated successfully',
                'alert-type' => 'success'
            );
        
            return redirect()->route('manage.slider')->with($notification);        
    
        } else { //without image   
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_bg' => $request->title_bg,
                'slider_slug_en' => strtolower(str_replace(' ', '-', $request->title_en)), // the space will be replaced by -
                'slider_slug_bg' => strtolower(str_replace(' ', '-', $request->title_bg)),
                'description_en' => $request->description_en,
                'description_bg' => $request->description_bg,
                'updated_at' => Carbon::now(),
            ]);
        
            $notification = array(
                'message' => 'Slider Updated successfully',
                'alert-type' => 'success'
            );
        
            return redirect()->route('manage.slider')->with($notification);        
        }
    
    }

    // Admin Delete Slider
    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $slider_image = $slider->slider_image;

        unlink($slider_image); // deleting the image from the folder

        $slider->delete(); // deleting the data from the db

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.slider')->with($notification);   
    }
}

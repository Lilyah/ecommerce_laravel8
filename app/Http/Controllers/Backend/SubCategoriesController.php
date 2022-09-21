<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategories;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class SubCategoriesController extends Controller
{
    // Admin All SubCategories View
    public function SubCategoriesView(){
        $categories = Categories::orderBy('category_name_en', 'ASC')->get(); //getting all data from the DB
        $subcategories = SubCategories::latest()->get(); //getting all data from the DB
        return view('backend.categories.subcategories_view', 
        compact(
            'subcategories', 
            'categories'
        ));
    }

    // Admin Add New SubCategory
    public function SubCategoryStore(Request $request){
        $request->validate([
           'category_id' => 'required',
           'subcategory_name_en' => 'required',
           'subcategory_name_bg' => 'required',
        ], [
           'category_id.required' => 'The field for category is required',
           'subcategory_name_en.required' => 'The field for english category name is required',
           'category_name_bg.required' => 'The field for bulgarian category name is required',
        ]);
       
        SubCategories::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bg' => $request->subcategory_name_bg,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)), // the space will be replaced by -
            'subcategory_slug_bg' => strtolower(str_replace(' ', '-', $request->subcategory_name_bg)),
            'created_at' => Carbon::now(),
        ]);
       
        $notification = array(
            'message' => 'New SubCategory added successfully',
            'alert-type' => 'success'
        );
       
        return redirect()->back()->with($notification);
    }

    // Admin Edit SubCategory
    public function SubCategoryEdit($id){
        $categories = Categories::orderBy('category_name_en', 'ASC')->get(); //getting all data from the DB
        $subcategory = SubCategories::findOrFail($id);
        return view('backend.categories.subcategory_edit', 
        compact(
            'categories',
            'subcategory'
        ));
    }

    // Admin Update SubCategory
    public function SubCategoryUpdate(Request $request){
        $subcategory_id = $request->id; // it's commit from subcategory_edit.blade.php <input type="hidden" HERE>>>>name="id"<<<<<< value="{{ $subcategory->id }}">
        
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bg' => 'required',
        ], [
            'category_id.required' => 'The field for category is required',
            'subcategory_name_en.required' => 'The field for english category name is required',
            'subcategory_name_bg.required' => 'The field for bulgarian category name is required',
        ]);
        
        SubCategories::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bg' => $request->subcategory_name_bg,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)), // the space will be replaced by -
            'subcategory_slug_bg' => strtolower(str_replace(' ', '-', $request->subcategory_name_bg)),
            'updated_at' => Carbon::now(),
        ]);
            
        $notification = array(
            'message' => 'SubCategory Updated successfully',
            'alert-type' => 'success'
        );
            
        return redirect()->route('all.subcategories')->with($notification);        
                
    }

    // Admin Delete SubCategory
    public function SubCategoryDelete($id){
        $subcategory = SubCategories::findOrFail($id)->delete(); // finding & deleting the data from the db;
        
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.subcategories')->with($notification);    
    }

}

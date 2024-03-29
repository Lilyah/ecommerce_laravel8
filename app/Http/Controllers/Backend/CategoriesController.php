<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoriesController extends Controller
{
    // Admin All Categories View
    public function CategoriesView(){
        $categories = Categories::latest()->get(); //getting all data from the DB
        return view('backend.categories.categories_view', compact('categories'));
    }

     // Admin Add New Category
     public function CategoryStore(Request $request){
         $request->validate([
             'category_name_en' => 'required',
             'category_name_bg' => 'required',
             'category_icon' => 'required',
         ], [
             'category_name_en.required' => 'The field for english category name is required',
             'category_name_bg.required' => 'The field for bulgarian category name is required',
             'category_icon.required' => 'The field for category icon is required',
         ]);
    
        Categories::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bg' => $request->category_name_bg,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)), // the space will be replaced by -
            'category_slug_bg' => strtolower(str_replace(' ', '-', $request->category_name_bg)),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);
    
        $notification = array(
            'message' => 'New Category added successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }

    // Admin Edit Category
    public function CategoryEdit($id){
        $category = Categories::findOrFail($id);
        return view('backend.categories.category_edit', compact('category'));
    }

    // Admin Update Category
    public function CategoryUpdate(Request $request){
        $category_id = $request->id; // it's commit from category_ednt.blade.php <input type="hidden" HERE>>>>name="id"<<<<<< value="{{ $category->id }}">
    
            $request->validate([
                'category_name_en' => 'required',
                'category_name_bg' => 'required',
                'category_icon' => 'required',
            ], [
                'category_name_en.required' => 'The field for english category name is required',
                'category_name_bg.required' => 'The field for bulgarian category name is required',
                'category_icon.required' => 'The field for category icon is required',
            ]);
    
            Categories::findOrFail($category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_bg' => $request->category_name_bg,
                'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)), // the space will be replaced by -
                'category_slug_bg' => strtolower(str_replace(' ', '-', $request->category_name_bg)),
                'category_icon' => $request->category_icon,
                'cat_on_index_page' => $request->cat_on_index_page,
                'updated_at' => Carbon::now(),
            ]);
        
            $notification = array(
                'message' => 'Category Updated successfully',
                'alert-type' => 'success'
            );
        
            return redirect()->route('all.categories')->with($notification);        
            
    }

    // Admin Delete Category
    public function CategoryDelete($id){
        $category = Categories::findOrFail($id)->delete(); // finding & deleting the data from the db;
    
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.categories')->with($notification);    
    }
    
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\SubSubCategories;
use App\Models\Brands;
use App\Models\MultiImg;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductsController extends Controller
{
    // Admin Add Product
    public function AddProduct(){
        $brands = Brands::latest()->get();
        $categories = Categories::latest()->get();
        $subcategories = SubCategories::latest()->get();
        return view('backend.products.product_add', compact(
            'brands',
            'categories',
            'subcategories',
        ));
    }

    // Admin Store Product
    public function ProductStore(Request $request){
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bg' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_bg' => 'required',
            'product_size_en' => 'required',
            'product_size_bg' => 'required',
            'product_color_en' => 'required',
            'product_color_bg' => 'required',
            'selling_price' => 'required',
            'short_descp_en' => 'required',
            'short_descp_bg' => 'required',
            'long_descp_en' => 'required',
            'long_descp_bg' => 'required',
            'product_thumbnail' => 'required',
        ], [
            // #custom messages for validation if needed
            'brand_id.required' => 'The brand field is required',
            'category_id.required' => 'The category field is required',
            'subcategory_id.required' => 'The subcategory field is required',
            'subsubcategory_id.required' => 'The subsubcategory field is required',
            'product_name_en.required' => 'The english name field is required',
            'product_name_bg.required' => 'The bulgarian name field is required',
            'product_qty.required' => 'The quantity field is required',
            'product_tags_en.required' => 'The english tags field is required',
            'product_tags_bg.required' => 'The bulgarian tags field is required',
            'product_size_en.required' => 'The english size field is required',
            'product_size_bg.required' => 'The bulgarian field size is required',
            'product_color_en.required' => 'The color in english field is required',
            'product_color_bg.required' => 'The color in bulgarian field is required',
            'short_descp_en.required' => 'The short description in english field is required',
            'short_descp_bg.required' => 'The short description in bulgarian field is required',
            'long_descp_en.required' => 'The long description in english field is required',
            'long_descp_bg.required' => 'The long description in bulgarian field is required',
        ]);

        $thumbnail = $request->file('product_thumbnail'); // passiing the file
        $name_gen = hexdec(uniqid()).'.'.$thumbnail->getClientOriginalExtension();
        Image::make($thumbnail)->resize(917, 1000)->save('upload/products/thumbnails/'.$name_gen);
        $product_thumbnail = 'upload/products/thumbnails/'.$name_gen;   

        // Insert the data and get the id of the product, because it will be needed for inserting MultiImg below in this method
        $product_id = Products::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,

            'product_name_en' => $request->product_name_en,
            'product_name_bg' => $request->product_name_bg,
            'product_slug_en' => strtolower(preg_replace("/[^a-zA-Z0-9]/", '-', $request->product_name_en)), // the space and some symbols will be replaced by -
            'product_slug_bg' => Str::of($request->product_name_bg)->slug('-'), // transforms the utf-8 charecters into english
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bg' => $request->product_tags_bg,
            'product_size_en' => $request->product_size_en,
            'product_size_bg' => $request->product_size_bg,
            'product_color_en' => $request->product_color_en,
            'product_color_bg' => $request->product_color_bg,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_descp_en' => $request->short_descp_en,
            'short_descp_bg' => $request->short_descp_bg,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bg' => $request->long_descp_bg,

            'product_thumbnail' => $product_thumbnail,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'created_at' => Carbon::now(),
        ]); 

        //----------------------
        //--- Multiple Image ---
        //----------------------

        $images = $request->file('multi_img');
        foreach($images as $image){
            $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/multi-images/'.$make_name);
            $uploadPath = 'upload/products/multi-images/'.$make_name;   

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'New Product added successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.products')->with($notification);        

    }

    // Admin Manage Products
    public function ProductsView(){
        $products = Products::latest()->get();
        return view('backend.products.products_view', compact(
            'products',
        ));
    }

    // Admin View Single Product
    public function ProductView($id){
        $product = Products::findOrFail($id);
        $brand = Brands::where('id', $product->brand_id)->first(); // when the id from table Brands matches the column 'brand_id' from table Products
        $category = Categories::where('id', $product->category_id)->first(); // when the id from table Categories matches the column 'category_id' from table Products
        $subcategory = SubCategories::where('id', $product->subcategory_id)->first(); // when the id from table SubCategories matches the column 'subcategory_id' from table Products
        $subsubcategory = SubSubCategories::where('id', $product->subsubcategory_id)->first(); // when the id from table SubSubCategories matches the column 'subsubcategory_id' from table Products

        $multiimages = MultiImg::where('product_id',$id)->get(); // when the id from column 'product_id' is matching the product id

        return view('backend.products.product_view', compact(
            'product',
            'brand',
            'category',
            'subcategory',
            'subsubcategory',
            'multiimages',
        ));
    }

    // Admin Edit Product
    public function ProductEdit($id){
        $product = Products::findOrFail($id);
        $brands = Brands::orderBy('brand_name_en', 'ASC')->get(); //getting all data from the DB
        $categories = Categories::orderBy('category_name_en', 'ASC')->get(); //getting all data from the DB
        $subcategories = SubCategories::orderBy('subcategory_name_en', 'ASC')->get(); //getting all data from the DB
        $subsubcategories = SubSubCategories::orderBy('subsubcategory_name_en', 'ASC')->get(); //getting all data from the DB

        $multiimages = MultiImg::where('product_id',$id)->get(); // when the id from column 'product_id' is matching the product id

        return view('backend.products.product_edit', compact(
            'product',
            'brands',
            'categories',
            'subcategories',
            'subsubcategories',
            'multiimages',
        ));
    }

    // Admin Update Product
    public function ProductUpdate(Request $request){
        $product_id = $request->id; // it's commit from product_edit.blade.php <input type="hidden" HERE>>>>name="id"<<<<<< value="{{ $products->id }}">
            
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bg' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_bg' => 'required',
            'product_size_en' => 'required',
            'product_size_bg' => 'required',
            'product_color_en' => 'required',
            'product_color_bg' => 'required',
            'selling_price' => 'required',
            'short_descp_en' => 'required',
            'short_descp_bg' => 'required',
            'long_descp_en' => 'required',
            'long_descp_bg' => 'required',
        ], [
            // #custom messages for validation if needed
            'brand_id.required' => 'The brand field is required',
            'category_id.required' => 'The category field is required',
            'subcategory_id.required' => 'The subcategory field is required',
            'subsubcategory_id.required' => 'The subsubcategory field is required',
            'product_name_en.required' => 'The english name field is required',
            'product_name_bg.required' => 'The bulgarian name field is required',
            'product_qty.required' => 'The quantity field is required',
            'product_tags_en.required' => 'The english tags field is required',
            'product_tags_bg.required' => 'The bulgarian tags field is required',
            'product_size_en.required' => 'The english size field is required',
            'product_size_bg.required' => 'The bulgarian field size is required',
            'product_color_en.required' => 'The color in english field is required',
            'product_color_bg.required' => 'The color in bulgarian field is required',
            'short_descp_en.required' => 'The short description in english field is required',
            'short_descp_bg.required' => 'The short description in bulgarian field is required',
            'long_descp_en.required' => 'The long description in english field is required',
            'long_descp_bg.required' => 'The long description in bulgarian field is required',
        ]);
            
        Products::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,

            'product_name_en' => $request->product_name_en,
            'product_name_bg' => $request->product_name_bg,
            'product_slug_en' => strtolower(preg_replace("/[^a-zA-Z0-9]/", '-', $request->product_name_en)), // the space and some symbols will be replaced by -
            'product_slug_bg' => Str::of($request->product_name_bg)->slug('-'), // transforms the utf-8 charecters into english
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bg' => $request->product_tags_bg,
            'product_size_en' => $request->product_size_en,
            'product_size_bg' => $request->product_size_bg,
            'product_color_en' => $request->product_color_en,
            'product_color_bg' => $request->product_color_bg,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_descp_en' => $request->short_descp_en,
            'short_descp_bg' => $request->short_descp_bg,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bg' => $request->long_descp_bg,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
                
        $notification = array(
            'message' => 'Product Updated successfully',
            'alert-type' => 'success'
        );
                
        return redirect()->route('all.products')->with($notification);        
            
    }

    // Admin Update Product Images
    public function ProductMultiImageUpdate(Request $request){
        $images = $request->multi_img; // it's commit from product_edit.blade.php, multiimage edit form, name="multi_img[ $multiimage->id ]"

        foreach($images as $id => $image){

            // Deleting the old image from the db
            $image_delete = MultiImg::findOrFail($id);
            unlink($image_delete->photo_name);

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/multi-images/'.$name_gen);
            $save_url = 'upload/products/multi-images/'.$name_gen;  

            MultiImg::where('id', $id)->update([
                'photo_name' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification = array(
            'message' => 'Product Images Updated successfully',
            'alert-type' => 'success'
        );
                
        return redirect()->back()->with($notification);        

    }

    // Admin Update Product Thumbnail Image
    public function ProductThumbnailImageUpdate(Request $request){
            $product_id = $request->id; // the id of the product
            $product_old_thumbnail = $request->old_image; // the old thumbnail of the product

            unlink($product_old_thumbnail); // deleting the old thumbnail from the db

            $thumbnail = $request->file('product_thumbnail');

                $name_gen = hexdec(uniqid()).'.'.$thumbnail->getClientOriginalExtension();
                Image::make($thumbnail)->resize(917, 1000)->save('upload/products/thumbnails/'.$name_gen);
                $save_url = 'upload/products/thumbnails/'.$name_gen;  

                Products::findOrFail($product_id)->update([
                    'product_thumbnail' => $save_url,
                    'updated_at' => Carbon::now(),
                ]);


            $notification = array(
                'message' => 'Product Thumbnail Updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);        

    }

    // Admin Delete Product Thumbnail Image
    public function ProductMultiImageDelete($id){
        $old_image = MultiImg::findOrFail($id); // detecting the old image
        unlink($old_image->photo_name); // deleting the image from the folder
        $old_image->delete(); // deleting the image from db

        $notification = array(
            'message' => 'Product Thumbnail Deleted successfully',
            'alert-type' => 'success'
        );
                
        return redirect()->back()->with($notification);     
    }

    // Admin Activate Product
    public function ProductActivate($id){
        Products::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Activated successfully',
            'alert-type' => 'success'
        );
                
        return redirect()->back()->with($notification); 

    }

    // Admin Deactivate Product
    public function ProductDeactivate($id){
        Products::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Deactivated successfully',
            'alert-type' => 'success'
        );
                
        return redirect()->back()->with($notification); 

    }

    // Admin Delete Product
    public function ProductDelete($id){
        $product =  Products::findOrFail($id);
        unlink($product->product_thumbnail); // deleting the image from the folder
        $product->delete(); // deleting the product from the db

        // Deleting the multiimages
        $multiimages = MultiImg::where('product_id',$id)->get(); // when the id from column 'product_id' is matching the product id
        foreach($multiimages as $multiimage){
            unlink($multiimage->photo_name);
            $multiimage->delete();
        }

        $notification = array(
            'message' => 'Product Deleted successfully',
            'alert-type' => 'success'
        );
                
        return redirect()->back()->with($notification); 

    }

}

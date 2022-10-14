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
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)), // the space will be replaced by -
            'product_slug_bg' => strtolower(str_replace(' ', '-', $request->product_name_bg)),
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
    
        return redirect()->back()->with($notification);


    }




}

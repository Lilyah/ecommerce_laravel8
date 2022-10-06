<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\SubSubCategories;
use App\Models\Brands;
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



}

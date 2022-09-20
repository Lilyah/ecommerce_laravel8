<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Admin All Categories View
    public function CategoriesView(){
        $categories = Categories::latest()->get(); //getting all data from the DB
        return view('backend.categories.categories_view', compact('categories'));
    }
}

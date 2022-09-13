<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    // Admin Brands
    public function BrandsView ()
    {
        $brands = Brands::latest()->get(); //getting all data from the DB
        return view('backend.brands.brands_view', compact('brands'));
    }
}

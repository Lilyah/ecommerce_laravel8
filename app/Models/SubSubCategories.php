<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_bg',
        'subsubcategory_slug_en',
        'subsubcategory_slug_bg',
    ];

    // Relationship with Categories table
    public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');
    }

    // Relationship with SubCategories table
    public function subcategory(){
        return $this->belongsTo(SubCategories::class,'subcategory_id','id');
    }
}

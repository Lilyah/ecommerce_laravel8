<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_bg',
        'subcategory_slug_en',
        'subcategory_slug_bg',
    ];

    // Relationship with Categories table
    public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');
    }
}

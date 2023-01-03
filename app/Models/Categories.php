<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_en',
        'category_name_bg',
        'category_slug_en',
        'category_slug_bg',
        'category_icon',
        'cat_on_index_page',
    ];

        // Relationship with Products table
        public function products(){
            return $this->belongsTo(Products::class,'id','category_id');
        }
}

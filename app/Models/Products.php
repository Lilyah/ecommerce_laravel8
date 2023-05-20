<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded = []; // with $guarded we don't need $fillable

    // Relationship with Categories table
    public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');
    }

    // Relationship with Brands table
    public function brand(){
        return $this->belongsTo(Brands::class,'brand_id','id');
    }


}

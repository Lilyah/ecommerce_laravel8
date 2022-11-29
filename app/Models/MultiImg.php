<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    use HasFactory;

    protected $guarded = []; // with $guarded we don't need $fillable

    // Relationship with Products table
    public function product(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
}

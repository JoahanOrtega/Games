<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //permitir asignacion masiva
    protected $fillable = ['name','image'];

    //Relacion entre 1 a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    // //Relacion entre muchos a muchos
    // public function brands(){
    //     return $this->belongsToMany(Brand::class);
    // }


    //relacionar el producto con la categoria (1 a muchos)
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}

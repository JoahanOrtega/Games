<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    //contrario a fillable, guarded especifica los campos que no quiero que tengan
    //  asignacion masiva
    protected $guarded = ['id', 'created_at', 'update_at'];

    //Relacion 1 a muchos
    public function products(){
        return $this->hasMany(Product::class);
    }

    //Relacion 1 a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }
}


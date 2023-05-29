<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;


    //contrario a fillable, guarded especifica los campos que no quiero que tengan
    //  asignacion masiva
    protected $guarded = ['id', 'created_at', 'update_at'];

    // //Relacion 1 a muchos inversa
    // public function brand(){
    //     return $this->belongsTo(Brand::class);
    // }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //relacion 1 a muchos polimorficas
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     protected $fillable = ["name","image","price","count_in_stock","description","category_id","barnd_id"];


     public function brand(){
        return $this->hasMany(Brand::class);
     }

     public function category(){
        return $this->hasMany(Categorie::class);
     }
}

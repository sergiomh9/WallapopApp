<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    
     protected $table = 'categoria';
    
    //public $timestamps = false;
    
    protected $fillable = ['categoria'];
    
    
     public function Productos() {
        return $this->hasMany('App\Models\Producto', 'idcategoria');
    }
}

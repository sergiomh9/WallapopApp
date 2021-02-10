<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
     protected $table = 'productos';
    
    
    
    
    protected $fillable = ['iduser', 'idcategoria', 'nombre', 'descripcion', 'uso', 'precio', 'fecha', 'estado', 'foto'];
   
   
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
    
    public function categoria() {
        return $this->belongsTo('App\Models\Categoria', 'idcategoria');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
}

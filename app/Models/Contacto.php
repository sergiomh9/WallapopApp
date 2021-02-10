<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    
    
    protected $table = 'contacto';
    
    
    
    
    protected $fillable = ['iduser1', 'iduser2', 'idproducto', 'textocontacto'];
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser1');
        return $this->belongsTo('App\Models\User', 'iduser2');
        
    }
    
    public function producto() {
        return $this->belongsTo('App\Models\Producto', 'idproducto');
        
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiero extends Model
{
    use HasFactory;
    
     protected $table = 'quieros';

    
    protected $fillable = ['iduser', 'idproducto'];
   
    
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
       
    }
    
    public function productos() {
        return $this->belongsTo('App\Models\Producto', 'idproducto');
       
    }
}

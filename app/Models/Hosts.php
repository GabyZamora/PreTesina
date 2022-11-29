<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosts extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'nombre',
        'descripcion',
        'urlfoto',
        'urllogo',
        'estado',
        'ruta_id',
        'user_id'
    ];

    public function Ruta(){
        return $this->belongsTo("App\Models\Ruta");
    }
    
    public function User(){
        return $this->belongsTo("App\Models\User");
    }
}

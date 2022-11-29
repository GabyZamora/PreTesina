<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'nombre',
        'descripcion',
        'urlfoto'
    ];

    public function Lugar(){
        return $this->belongsToMany(Lugar::class, 'serv_lugars');
    }
}

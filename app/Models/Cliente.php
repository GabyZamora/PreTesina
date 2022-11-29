<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fechaNac',
        'dui',
        'telefono',
        'correo',
        'direccion',
    ];

    public function User(){
        return $this->belongsTo("App\Models\User");
    }
}

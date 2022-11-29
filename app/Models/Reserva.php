<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'checkin',
        'checkout',
        'preciototal',
        'numHuesped',
        'mascotas',
        'estado_id',
        'user_id',
        'lugar_id'
    ];

    public function Estado(){
        return $this->belongsTo("App\Models\Estado");
    }

    public function User(){
        return $this->belongsTo("App\Models\User");
    }

    public function Lugar(){
        return $this->belongsTo("App\Models\Lugar"); 
    }
}

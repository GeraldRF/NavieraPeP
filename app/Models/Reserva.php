<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['itinerario_id', 'tipo', 'cantidad', 'total', 'fecha_reserva', 'user_id', 'descripcion', 'cancelado'];

    public function itinerario(){
        return $this->belongsTo(Itinerario::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

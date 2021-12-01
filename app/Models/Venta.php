<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['itinerario_id', 'tipo', 'cantidad', 'total', 'fecha_venta', 'user_id', 'descripcion'];

    public function itinerario(){
        return $this->belongsTo(Itinerario::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

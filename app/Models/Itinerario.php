<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_hora_salida', 'fecha_hora_llegada', 'ruta_id', 'nave_id', 'precio', 'cant_pasajeros', 'cant_carga'];

    public function nave(){
        return $this->belongsTo(Nave::class);
    }
    public function ruta(){
        return $this->belongsTo(Ruta::class);
    }
}

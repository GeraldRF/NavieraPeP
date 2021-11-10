<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = ['origen','destino','es_usado'];

    public function itinerarios(){
        return $this->HasMany(Itinerario::class);
    }
}

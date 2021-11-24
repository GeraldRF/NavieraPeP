<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nave extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cap_pasajeros', 'cap_carga','es_usado'];

    public function itinerarios(){
        return $this->HasMany(Itinerario::class);
    }
}

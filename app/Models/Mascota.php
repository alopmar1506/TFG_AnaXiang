<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = ['nombreMascota','especie','tamanio', 'fotoMascota', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

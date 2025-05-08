<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellido','direccion','email','contrasena','especie','rol', 'fotoUsuario', 'fotoMascota','descripcion', 'opinion'];

    public function mascota()
    {
        return $this->hasMany(Mascota::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = ['nombre','apellido','direccion','email','contrasena','rol', 'fotoUsuario', 'descripcion', 'opinion'];

    
    protected $hidden = [
        'contrasena',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function mascota()
    {
        return $this->hasMany(Mascota::class);
    }
}

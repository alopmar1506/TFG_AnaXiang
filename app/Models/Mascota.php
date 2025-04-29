<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','especie','tamanio'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

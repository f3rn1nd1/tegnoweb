<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'ciudad',
        'direccion',
        'email',
        'telefono',
        'servicio_id'
        
    ];
    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}

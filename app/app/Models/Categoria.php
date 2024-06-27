<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        
    ];
    use HasFactory;
    public function Servicios(): HasMany
    {
        return $this->hasMany(Servicio::class);
    }
}

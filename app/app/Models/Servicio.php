<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Servicio extends Model
{
    protected $fillable = [
        'servicio',
        'ubicacion',
        'duracion',
        'descr',
        'categoria_id',
        
    ];
    use HasFactory;
    
    public function Categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

}

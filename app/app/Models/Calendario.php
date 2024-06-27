<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $fillable=['title', 'start_date', 'end_date'];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'articulo_id',
        'codigo',
        'descripcion',
        'cantidad',
        'precio1',
        'precio2',
        'precio3',
        'precio4',
        'precio5',
        'tramo1',
        'tramo2',
        'tramo3',
        'tramo4',
        'tramo5',
    ];
}

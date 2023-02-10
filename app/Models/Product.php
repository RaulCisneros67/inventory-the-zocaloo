<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
class Product extends Model{
    use HasFactory;
    use MediaAlly;
    protected $fillable = [
        'Imagen',
        'Producto',
        'Clave',
        'Unidades',
        'Marca',
        'Precio'
    ];
}

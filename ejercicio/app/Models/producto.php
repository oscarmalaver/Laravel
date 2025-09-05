<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['codigo', 'nombre', 'descripcion', 'cantidad', 'precio'];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'producto_id', 'codigo');
    }
}

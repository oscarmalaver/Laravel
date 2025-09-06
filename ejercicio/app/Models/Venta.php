<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $fillable = ['producto_id', 'cantidad_vendida', 'precio_unitario', 'total', 'fecha'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'codigo');
    }
    public $timestamps = false;
}

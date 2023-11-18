<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasModel extends Model{
    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    protected $fillable = [
        'id_usuario',
        'id_producto',
        'fecha',
        'cantidad'
    ];
}

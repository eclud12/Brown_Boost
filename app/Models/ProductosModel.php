<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosModel extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
            'clave',
            'nombre',
            'precio',
            'tamaño',
            'img'
    ];

    public function scopeNombre($query, $nombre){
        if(trim($nombre) != ""){
            $query->where(\DB::raw("nombre"), "like", "%".$nombre."%");
        }
    }

    public function scopeTamano($query, $tamano){
        if($tamano != ""){
            $query->where("tamaño",$tamano);
        }
    }

    public function scopeClave($query, $clave){
        if(trim($clave) != ""){
            $query->where(\DB::raw("clave"), "like", "%".$clave."%");
        }
    }

}

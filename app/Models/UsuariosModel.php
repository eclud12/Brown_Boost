<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'nombre',
        'app',
        'apm',
        'fn',
        'genero',
        'celular',
        'correo',
        'contrasena',
        'img',
        'id_tipo',
        'activo'
    ];
    public function scopeNombre($query, $nombre){
        if(trim($nombre) != ""){
            $query->where(\DB::raw("CONCAT(nombre,'', app, '', apm)"), "like", "%".$nombre."%");
        }
    }

    public function scopeTipo($query, $tipo){
        if($tipo != ""){
            $query->where("id_tipo",$tipo);
        }
    }
    public function scopeGenero($query, $genero){
        if($genero != ""){
            $query->where("genero",$genero);
        }
    }
    public function scopeFechas($query, $fni, $fnf){
        if($fni != ""){
            if($fni <= $fnf){
                $query->where(\DB::raw("fn"), '>=', $fni)
                      ->where(\DB::raw("fn"), '<=', $fnf);
            }
        }
    }
    public function scopeActivo($query, $activo){
        if(isset($activo)){
            $query->where(\DB::raw("activo"),1);
        }
    }
    public function scopeInactivo($query, $inactivo){
        if(isset($inactivo)){
            $query->where(\DB::raw("activo"),2);
       	   }
    }
}
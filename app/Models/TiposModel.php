<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposModel extends Model{
    
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    protected $fillable = [
              'nombre'
    ];
}

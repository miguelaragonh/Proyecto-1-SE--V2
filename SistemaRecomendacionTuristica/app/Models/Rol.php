<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $primaryKey = "id";
    protected $table = "roles";
    public $timestamps = false;

    // Campos que pueden ser asignados de manera masiva
    protected $fillable = ['nombre', 'descripcion', 'idEstado'];

    // Relación con la tabla estados
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado');
    }
}

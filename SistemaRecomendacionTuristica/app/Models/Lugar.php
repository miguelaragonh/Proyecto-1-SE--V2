<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table= "lugares";
    protected $primaryKey='id';
    public $timestamps =false;

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}

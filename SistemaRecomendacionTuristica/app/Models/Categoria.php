<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table= "categorias";
    protected $primaryKey='id';
    public $timestamps =false;

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idEstado');
    }
}

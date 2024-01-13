<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table= "estados";
    protected $primaryKey='id';
    public $timestamps =false;
    protected $fillable = [
        'nombre',
        'descripcion',
        'status',
    ];
}

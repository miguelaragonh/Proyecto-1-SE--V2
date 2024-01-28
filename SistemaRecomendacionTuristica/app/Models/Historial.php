<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $primaryKey = "id";
    protected $table = "historial";
    public $timestamps = false;
}

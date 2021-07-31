<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incorpora extends Model
{
    protected $table ='incorporas';    
    protected $fillable = ['ID_contrato', 'ID_perfil', 'Cantidad'];
}

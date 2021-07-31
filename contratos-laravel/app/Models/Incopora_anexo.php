<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incopora_anexo extends Model
{
    protected $table ='incopora_anexos';    
    protected $fillable = ['ID_anexo', 'ID_perfil', 'Cantidad'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clausula extends Model
{
   
    protected $table ='clausulas';
    protected $primaryKey ='ID_clausula';
    public function scopeClausulas($query, $categoria)
    {
       return $query->where('ID_categoria',$categoria);
    }
}



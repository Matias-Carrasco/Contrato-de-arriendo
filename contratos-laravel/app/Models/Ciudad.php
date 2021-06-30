<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table ='ciudads';
    protected $primaryKey = 'ID_ciudad';
    public function scopeCiudad($query, $region)
    {
       return $query->where('id_region','=',$region);
    }
    
}

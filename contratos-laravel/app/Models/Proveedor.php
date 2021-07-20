<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table ='proveedors';
    protected $primaryKey='ID_proveedor';
    public $timestamps = false;

    public function Ciudad(){
        return $this->hasMany(Ciudad::class);
    }
}


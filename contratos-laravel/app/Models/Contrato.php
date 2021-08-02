<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $primaryKey='ID_contrato';
    protected $fillable = ['PDF_firmado'];
    public $timestamps = false;

}

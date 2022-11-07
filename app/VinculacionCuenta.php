<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VinculacionCuenta extends Model
{
    protected $table = 'cuenta_empresa';
    protected $primaryKey = ['id_cuenta', 'id_cuenta_sistema', 'id_empresa'];
    public $incrementing = false;
}

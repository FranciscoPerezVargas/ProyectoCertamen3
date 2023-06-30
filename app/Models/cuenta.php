<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class cuenta extends Model
{
    use HasFactory;
    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    public $incrementing = false;
   

    public function perfil()
    {
        return $this->belongsTo('App\Models\Perfil');
    }

    public function imagenes()
    {
        return $this->hasMany('\App\Models\Imagen', 'cuenta_user', 'user');
    }
}

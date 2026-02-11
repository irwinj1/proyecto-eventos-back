<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CtlDistrito extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'ctl_distritos';
    protected $fillable = [
        'nombre',
        'id_municipio'
    ];

    public function municipio()
    {
        return $this->belongsTo(CtlMunicipio::class, 'id_municipio', 'id');
    }

    public function direccion(){
        return $this->hasMany(MntDireccion::class,'id_distrito','id');
    }
}

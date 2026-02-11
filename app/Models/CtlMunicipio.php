<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CtlMunicipio extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'ctl_municipios';
    protected $fillable = [
        'nombre',
        'id_departamento'
    ];

    public function departamentos(){
        return $this->belongsTo(CtlDepartamento::class,'id_departamento','id');
    }

    public function distritos(){
        return $this->hasMany(CtlDistrito::class,'id_municipio','id');
    }
}

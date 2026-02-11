<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CtlDepartamento extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'ctl_departamentos';
    protected $fillable = [
        'nombre',
        'pais_id'
    ];
    
    public function pais(){
        return $this->belongsTo(CtlPais::class,'pais_id','id');
    }

    public function municipios(){
        return $this->hasMany(CtlMunicipio::class,'id_departamento','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CtlPais extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'ctl_pais';
    protected $fillable = [
        'nombre'
    ];
    public function departamento(){
        return $this->hasMany(CtlDepartamento::class,'pais_id','id');
    }
}

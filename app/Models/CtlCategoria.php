<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class CtlCategoria extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;

    protected $table = "ctl_categorias";

    protected $fillable = [
        'nombre',
        'estado',
        'color',
        'icono',
        'id_usuario_creacion',
        'id_usuario_actualizacion',
        'id_usuario_eliminacion'
    ];

    public function usuarioActualiza()
    {
        return $this->belongsTo(User::class, 'id_usuario_actualizacion', 'id');
    }
    public function usuarioCrea(){
        return $this->belongsTo(User::class,'id_usuario_creacion','id');
    }
    public function usuarioElimina(){
        return $this->belongsTo(User::class,'id_usuario_eliminacion','id');
    }
    public function eventos(){
        return $this->hasMany(MntEvento::class,'id_categoria','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class MntContacto extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'mnt_contacto';

    protected $fillable = [
        'nombre',
        'id_tipo_contacto',
        'id_persona',
        'id_usuario_creacion',
        'id_usuario_actualizacion',
        'id_usuario_eliminacion',
    ];

    public function usuarioActualiza()
    {
        return $this->belongsTo(User::class, 'id_usuario_actualiza', 'id');
    }

    public function usuarioCrea()
    {
        return $this->belongsTo(User::class, 'id_usuario_creacion', 'id');
    }

    public function usuarioElimina()
    {
        return $this->belongsTo(User::class, 'id_usuario_eliminacion', 'id');
    }

    public function tipoContacto()
    {
        return $this->belongsTo(CtlTipoContacto::class, 'id_tipo_contacto', 'id');
    }

    public function persona()
    {
        return $this->belongsTo(MntPersona::class, 'id_persona', 'id');
    }
}

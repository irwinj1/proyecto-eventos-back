<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class MntPersona extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'mnt_persona';

    protected $fillable = [
        'nombre',
        'apellido',
        'estado',
        'fecha_nacimiento',
        'id_genero',
        'id_usuario',
        'id_usuario_creacion',
        'id_usuario_actualizacion',
        'id_usuario_eliminacion',
    ];

    public function contactos()
    {
        return $this->hasMany(MntContacto::class, 'id_persona', 'id');
    }

    public function direcciones()
    {
        return $this->hasMany(MntDireccion::class, 'id_persona', 'id');
    }

    public function genero()
    {
        return $this->belongsTo(CtlGenero::class, 'id_genero', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function usuarioActualiza()
    {
        return $this->belongsTo(User::class, 'id_usuario_actualizacion', 'id');
    }

    public function usuarioCrea()
    {
        return $this->belongsTo(User::class, 'id_usuario_creacion', 'id');
    }

    public function usuarioElimina()
    {
        return $this->belongsTo(User::class, 'id_usuario_eliminacion', 'id');
    }
}


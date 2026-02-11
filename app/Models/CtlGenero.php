<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CtlGenero extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'ctl_genero';

    protected $fillable = [
        'nombre',
        'estado',
        'id_usuario_creacion',
        'id_usuario_actualizacion',
        'id_usuario_eliminacion'
    ];

    protected $casts = [
        'estado' => 'boolean',
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

    public function personas()
    {
        return $this->hasMany(MntPersona::class, 'id_genero', 'id');
    }
}

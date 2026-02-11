<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class MntDireccion extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'mnt_direcciones';

    protected $fillable = [
        'direccion',
        'id_distrito',
        'id_persona',
        'id_evento',
        'id_usuario_creacion',
        'id_usuario_actualizacion',
        'id_tipo_direccion',
    ];

    public function usuarioActualiza()
    {
        return $this->belongsTo(User::class, 'id_usuario_actualiza', 'id');
    }

    public function usuarioCrea()
    {
        return $this->belongsTo(User::class, 'id_usuario_creacion', 'id');
    }

    public function distrito()
    {
        return $this->belongsTo(CtlDistrito::class, 'id_distrito', 'id');
    }

    public function persona()
    {
        return $this->belongsTo(MntPersona::class, 'id_persona', 'id');
    }

    public function evento()
    {
        return $this->belongsTo(MntEvento::class, 'id_evento', 'id');
    }
}

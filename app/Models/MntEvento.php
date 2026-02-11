<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class MntEvento extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'mnt_eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'slug',
        'imagen',
        'fecha_inicio',
        'fecha_fin',
        'localidad',
        'estado',
        'es_online',
        'meet_url',
        'cantidad_asistentes',
        'id_categoria',
        'id_usuario_creacion',
        'id_usuario_actualizacion',
        'id_usuario',
        'es_silla_numerada',
    ];

    protected $casts = [
        'estado'            => 'boolean',
        'es_online'         => 'boolean',
        'es_silla_numerada' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(CtlCategoria::class, 'id_categoria', 'id');
    }

    public function direcciones()
    {
        return $this->hasMany(MntDireccion::class, 'id_evento', 'id');
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

    public function archivos()
    {
        return $this->hasMany(MntEventoArchivo::class, 'id_evento', 'id');
    }
}

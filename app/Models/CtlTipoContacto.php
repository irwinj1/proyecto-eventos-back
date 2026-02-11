<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CtlTipoContacto extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'ctl_tipo_contactos';

    protected $fillable = [
        'nombre',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function contactos()
    {
        return $this->hasMany(MntContacto::class, 'id_tipo_contacto', 'id');
    }
}

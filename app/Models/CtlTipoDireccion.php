<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CtlTipoDireccion extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'ctl_tipo_direcciones';

    protected $fillable = [
        'nombre',
        'estado'
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function direcciones()
    {
        return $this->hasMany(MntDireccion::class, 'id_tipo_direccion', 'id');
    }
}

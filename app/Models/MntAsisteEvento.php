<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class MntAsisteEvento extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'mnt_asiste_evento';

    protected $fillable = [
        'id_evento',
        'id_usuario',
        'estado',
        'check_in',
        'numero_silla',
    ];

    protected $casts = [
        'estado'   => 'boolean',
        'check_in' => 'boolean',
    ];

    public function evento()
    {
        return $this->belongsTo(MntEvento::class, 'id_evento', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}

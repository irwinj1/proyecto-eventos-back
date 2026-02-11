<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class MntEventoArchivo extends Model
{
    //
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'mnt_evento_archivos';
    protected $fillable = [
        'id_evento',
        'nombre',
        'tipo',
        'url',
        'id_usuario_creacion'
    ];
    public function evento(){
        return $this->belongsTo(MntEvento::class,'id_evento','id');
    }
    public function usuarioCrea(){
        return $this->belongsTo(User::class,'id_usuario_creacion','id');
    }

}

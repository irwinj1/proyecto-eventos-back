<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //retornar roles y permisos por separados
    public function getRoleNames()
    {
        return $this->roles;
    }
    public function getAllPermissions()
    {
        return $this->permissions;
    }
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        $claims = [
            'user' => $this->name,
            'email' => $this->email,
            'id' => $this->id,
        ];
        try {
            $claims['roles'] = $this->roles()->pluck('name')->toArray();
            $claims['permissions'] = $this->getAllPermissions()->pluck('name')->toArray();
        } catch (\Throwable $e) {
            $claims['roles'] = [];
            $claims['permissions'] = [];
        }
        return $claims;
    }
    public function categoriaActualiza(){
        return $this->hasMany(CtlCategoria::class,'id_usuario_actualiza','id');
    }
    public function categoriaCrea(){
        return $this->hasMany(CtlCategoria::class,'id_usuario_creacion','id');
    }
    public function categoriaElimina(){
        return $this->hasMany(CtlCategoria::class,'id_usuario_eliminacion','id');
    }
    public function generoActualiza(){
        return $this->hasMany(CtlGenero::class,'id_usuario_actualiza','id');
    }
    public function generoCrea(){
        return $this->hasMany(CtlGenero::class,'id_usuario_creacion','id');
    }
    public function generoElimina(){
        return $this->hasMany(CtlGenero::class,'id_usuario_eliminacion','id');
    }
    public function direccionActualiza(){
        return $this->hasMany(MntDireccion::class,'id_usuario_actualiza','id');
    }
    public function direccionCrea(){
        return $this->hasMany(MntDireccion::class,'id_usuario_creacion','id');
    }public function contactoActualiza(){
        return $this->hasMany(MntContacto::class,'id_usuario_actualiza','id');
    }
    public function contactoCrea(){
        return $this->hasMany(MntContacto::class,'id_usuario_creacion','id');
    }
    public function contactoElimina(){
        return $this->hasMany(MntContacto::class,'id_usuario_eliminacion','id');
    }
    public function persona()
    {
        return $this->hasOne(MntPersona::class, 'id_usuario', 'id');
    }
    public function personaActualiza(){
        return $this->hasMany(MntPersona::class,'id_usuario_actualiza','id');
    }
    public function personaCrea(){
        return $this->hasMany(MntPersona::class,'id_usuario_creacion','id');
    }
    public function personaElimina(){
        return $this->hasMany(MntPersona::class,'id_usuario_eliminacion','id');
    }
    public function evento(){
        return $this->hasMany(MntEvento::class,'id_usuario','id');
    }
    public function eventoActualiza(){
        return $this->hasMany(MntEvento::class,'id_usuario_actualiza','id');
    }
    public function eventoCrea(){
        return $this->hasMany(MntEvento::class,'id_usuario_creacion','id');
    }
    public function archivoCrea(){
        return $this->hasMany(MntEventoArchivo::class,'id_usuario_creacion','id');
    }
    public function asisteEvento(){
        return $this->hasMany(MntAsisteEvento::class,'id_usuario','id');
    }
}

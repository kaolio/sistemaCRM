<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;


//spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**b 
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ciudad',
        'telefono',
        'provincia',
        'codigoPostal',
        'razonSocial',
        'direccionSocial',
        'nombreComercial',
        'direccionComercial',
        'horarioComercial',
        'personaContacto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image(){

        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(){

        $usuario = Auth::user()->roles->pluck('name');
        return $usuario[0];
    }

    public function validarCorreo($correo){

        $result  = DB::table('users')
                    ->where('email','=', $correo)
                    ->exists();
        return $result;

    }

   /* public function getAvatarUrl()
{
    if ($this->photoPerfil)
        return asset('/user/imagenes'.$this->id.'.'.$this->photoPerfil);

    return asset('user/imagenes/default.jpg');
}*/

}

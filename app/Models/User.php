<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

<<<<<<< HEAD
    // Nombre de la tabla en la BD
    protected $table = 'Users';

    protected $primaryKey = 'id';

=======
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    public function Pedido(){
        return $this->hasMany(Pedido::class);
    }

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'username',
    'password',
    'nombre',  
    'apellidos',
<<<<<<< HEAD
    'email', 
    'telefono',
    'numero_cedula',  
    'ruta_imagen',
    'FK_id_estado'];
=======
    'correo', 
    'telefono',
    'numero_cedula',  
    'ruta_imagen',
    'activo'];
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datatime',
    ];

    public function getAuthPassword(){
        return $this->password;
    }

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}
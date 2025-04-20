<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable{
    use HasFactory;

    public function Pedido(){
        return $this->hasMany(Pedido::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'usuarios';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'username',
        'password',
        'nombre',  
        'apellidos',
        'email', 
        'telefono',
        'numero_cedula',  
        'ruta_imagen',
        'FK_id_estado'];

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

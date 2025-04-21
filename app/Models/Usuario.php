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
    protected $table = 'FIDE_USUARIO_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_usuario';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'identificacion_usuario',
        'nombre_usuario_usuario',
        'primer_Apellido_usuario',  
        'segundo_Apellido_usuario',
        'num_Telefono_usuario', 
        'correo_electronico_usuario',
        'contrasena_usuario',  
        'fk_id_estado'];

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

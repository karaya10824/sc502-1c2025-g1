<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Authenticatable{
    use HasFactory;

    public function Pedido(){
        return $this->hasMany(Pedido::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'FIDE_CLIENTES_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_cliente';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'identificacion_cliente',
        'nombre_cliente',
        'primer_Apellido_cliente',  
        'segundo_Apellido_cliente',
        'num_Telefono_cliente', 
        'contrasena_cliente',  
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

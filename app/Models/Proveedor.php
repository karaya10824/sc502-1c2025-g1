<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model{
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_PROVEEDORES_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_proveedor';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre_proveedor',
    'descripcion_producto',
    'direccion_proveedor',  
    'telefono_proveedor',
    'correo_proveedor',
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

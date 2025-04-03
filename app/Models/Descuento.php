<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;

    public function Pedido(){
        return $this->hasOne(Producto::class);
    }

    public function CategoriaEnvio(){
        return $this->hasOne(CategoriaEnvio::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'descuentos';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_descuento';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'porcentaje',
    'codigo_descuento',
    'descripcion_descuento',  
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

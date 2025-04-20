<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Descuento extends Model{
    use HasFactory;
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_DESCUENTOS_TB';
=======
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
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    // Nombre de la clave primaria
    protected $primaryKey = 'id_descuento';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
<<<<<<< HEAD
    'porcentaje_descuento',
    'codigo_de_descuento',
    'descripcion_descuento',  
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //
=======
    'porcentaje',
    'codigo_descuento',
    'descripcion_descuento',  
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
}

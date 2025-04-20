<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class CategoriaGasto extends Model{
=======
class CategoriaGastos extends Model
{
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    use HasFactory;
    
    public function Gasto(){
        return $this->hasOne(Gasto::class);
    }

    // Nombre de la tabla en la BD
<<<<<<< HEAD
    protected $table = 'FIDE_CATEGORIA_GASTOS_TB';
=======
    protected $table = 'categoriagastos';
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria_gasto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
<<<<<<< HEAD
    'descripcion_categoria_gasto',
    'fk_id_estado'];
=======
    'nombre_categoria',
    'activo'];
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class CategoriaEnvio extends Model{
    use HasFactory;

    public function producto(){
        return $this->hasOne(Producto::class);
    }
    
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_CATEGORIA_GASTOS_TB';
=======
class CategoriaEnvio extends Model
{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'categoriaenvios';
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria_envio';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
<<<<<<< HEAD
    'descripcion_categoria_gasto',
    'FK_id_estado'];
=======
    'descripcion',
    'activo'];
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

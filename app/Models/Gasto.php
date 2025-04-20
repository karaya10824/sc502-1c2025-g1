<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Models\CategoriaGasto;
=======
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

class Gasto extends Model
{
    use HasFactory;

<<<<<<< HEAD
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_GASTOS_TB';
=======
    public function CategoriaGasto(){
        return $this->belongsTo(CategoriaGasto::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'gastos';
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    // Nombre de la clave primaria
    protected $primaryKey = 'id_gasto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'monto_gasto',
<<<<<<< HEAD
    'descripcion_gasto',
    'fecha_gasto',
    'fk_id_categoria_gasto',
    'fk_id_estado',];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function categoriagasto(){
        return $this->belongsTo(CategoriaGasto::class, 'fk_id_categoria_gasto');
    }
=======
    'descripcion',
    'fecha'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
}

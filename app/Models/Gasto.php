<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaGasto;

class Gasto extends Model
{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'FIDE_GASTOS_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_gasto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'monto_gasto',
    'descripcion_gasto',
    'fecha_gasto',
    'fk_id_categoria_gasto',
    'fk_id_estado',];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function categoriagasto(){
        return $this->belongsTo(CategoriaGasto::class, 'fk_id_categoria_gasto', 'id_categoria_gasto');
    }
}

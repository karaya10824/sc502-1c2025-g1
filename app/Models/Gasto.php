<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    public function CategoriaGasto(){
        return $this->belongsTo(CategoriaGasto::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'gastos';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_gasto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'monto_gasto',
    'descripcion',
    'fecha'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

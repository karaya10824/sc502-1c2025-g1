<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGastos extends Model
{
    use HasFactory;
    
    public function Gasto(){
        return $this->hasOne(Gasto::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'categoriagastos';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria_gasto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre_categoria',
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

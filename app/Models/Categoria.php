<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function producto(){
        return $this->hasOne(Producto::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'categorias';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre_categoria',
    'descripcion_categoria',
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

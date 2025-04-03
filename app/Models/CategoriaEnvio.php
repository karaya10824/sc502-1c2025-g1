<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaEnvio extends Model
{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'categoriaenvios';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria_envio';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'descripcion',
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

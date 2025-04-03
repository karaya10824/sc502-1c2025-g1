<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function detallePedido(){
        return $this->hasMany(DetallePedido::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'productos';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_producto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'id_categoria',
    'nombre_producto',
    'descripcion',  
    'cantidad',
    'imagen', 
    'precio_costo',
    'precio_venta',  
    'precio_por_mayor',
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

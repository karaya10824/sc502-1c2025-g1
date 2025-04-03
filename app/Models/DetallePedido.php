<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedidos extends Model
{
    use HasFactory;

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'detallespedidos';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_detalle_pedidos';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'precio',
    'cantidad',
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
}

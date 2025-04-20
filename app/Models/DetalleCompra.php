<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Producto;

class DetallePedido extends Model{
    use HasFactory;
    
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_DETALLE_COMPRAS_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_detalle_compra';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'nombre_proveedor',
    'subtotal',
    'detalle',
    'FK_id_pedido',
    'FK_id_producto'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function pedido(){
        return $this->belongsTo(Pedido::class, 'FK_id_pedido', 'id_pedido');
    }
    
    public function producto(){
        return $this->belongsTo(Producto::class, 'FK_id_producto', 'id_producto');
    }
}

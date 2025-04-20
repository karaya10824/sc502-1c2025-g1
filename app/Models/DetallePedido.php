<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class DetallePedido extends Model{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'FIDE_DETALLE_PEDIDO_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_detalle_pedido';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'cantidad',
    'subtotal',
    'detalle',
    'fk_id_pedido',
    'fk_id_producto'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function pedido(){
        return $this->belongsTo(Pedido::class, 'fk_id_pedido', 'id_pedido');
    }

    public function producto(){
        return $this->belongsTo(Producto::class, 'fk_id_producto', 'id_producto');
    }
=======
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
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
}

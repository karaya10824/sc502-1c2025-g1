<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

<<<<<<< HEAD
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_PEDIDOS_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_pedido';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'fecha_pedido',
    'subtotal_pedido',
    'total_pedido',
    'detalle_pedido',
    'fk_id_cliente',
    'fk_id_descuento',
    'fk_id_metodo_de_pago',
    'fk_id_estado',];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function detallePedido(){
        return $this->hasMany(DetallePedido::class, 'fk_id_pedido', 'id_pedido');
    }

    public function metodoPago(){
        return $this->belongsTo(MetodoPago::class, 'fk_id_metodo_de_pago', 'id_metodo_de_pago');
=======
    public function detallePedido(){
        return $this->hasOne(DetallePedido::class);
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function descuento(){
        return $this->belongsTo(Descuento::class);
    }

    public function envio(){
        return $this->belongsTo(Envio::class);
    }
<<<<<<< HEAD
=======

    // Nombre de la tabla en la BD
    protected $table = 'pedidos';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'fecha',
    'precio_Envio',
    'subtotal',
    'detalles',
    'activo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
}

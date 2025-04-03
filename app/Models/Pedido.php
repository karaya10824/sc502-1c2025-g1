<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function detallePedido(){
        return $this->hasOne(DetallePedido::class);
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
}

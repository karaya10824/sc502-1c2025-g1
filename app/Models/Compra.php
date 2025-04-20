<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;

class Compra extends Model{
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_COMPRAS_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_compra';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'fecha_compra',
    'total_compra',
    'detalle_compra',  
    'fk_id_proveedor',
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    //Relaciones con otras tablas
    public function Proveedor(){
        return $this->belongsTo(Proveedor::class, 'fk_id_proveedor');
    }

    public function estado(){
        return $this->belongsTo(Estado::class, 'fk_id_estado');
    }
}

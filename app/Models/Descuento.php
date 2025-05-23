<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model{
    use HasFactory;
    // Nombre de la tabla en la BD
    protected $table = 'FIDE_DESCUENTOS_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_descuento';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'porcentaje_descuento',
    'codigo_de_descuento',
    'descripcion_descuento',  
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;


    public function estado(){
        return $this->belongsTo(Estado::class, 'fk_id_estado', 'id_estado');
    }

    //
}

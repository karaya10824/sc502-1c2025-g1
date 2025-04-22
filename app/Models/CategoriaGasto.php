<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGasto extends Model{
    use HasFactory;
    
    public function Gasto(){
        return $this->hasOne(Gasto::class);
    }

    // Nombre de la tabla en la BD
    protected $table = 'FIDE_CATEGORIA_GASTOS_TB';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_categoria_gasto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
    'descripcion_categoria_gasto',
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    public function estado(){
        return $this->belongsTo(Estado::class, 'fk_id_estado', 'id_estado');
    }
}

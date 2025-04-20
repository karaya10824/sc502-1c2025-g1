<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Producto extends Model implements HasMedia{
    use HasFactory, InteractsWithMedia;

    // Nombre de la tabla en la BD
    protected $table = 'FIDE_PRODUCTOS_TB';
=======
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
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3

    // Nombre de la clave primaria
    protected $primaryKey = 'id_producto';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
<<<<<<< HEAD
    'nombre_producto',
    'descripcion_producto',
    'cantidad_producto',  
    'cantidad_producto',
    'precio_costo_producto',
    'precio_venta_producto',
    'precio_por_mayor_producto',
    'fk_id_categoria_prod',
    'fk_id_proveedor',
    'fk_id_estado'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    public function registerMediaCollections(): void{
        $this->addMediaCollection('imagenes')->useDisk('public');
    }

    // Relaciones con otras tablas
    public function categoria(){
        return $this->belongsTo(FideCategoria::class, 'fk_id_categoria_prod', 'id_categoria_prod');
    }

    public function proveedor(){
        return $this->belongsTo(FideProveedor::class, 'fk_id_proveedor', 'id_proveedor');
    }

    public function estado(){
        return $this->belongsTo(FideEstado::class, 'fk_id_estado', 'id_estado');
    }
=======
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
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
}

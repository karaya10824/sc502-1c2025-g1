@extends('layouts.dashboard')

@section('title', 'Modificar Pedido')

@section('principal')
<form class="" action="{{ url('/pedidos/modificar/' . $Pedido['id_pedido']) }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="productos" id="productos">
    <input type="hidden" name="cantidades" id="cantidades">
    <input type="hidden" name="precios" id="precios">
    <input type="hidden" name="descuentos" id="descuentos">

    <div class="container w-full mx-auto mt-4 px-6">
    <h2 class="text-2xl font-bold mb-4">Modificar Pedido</h2>
        <div class="w-auto flex flex-col">
                <div class="flex flex-row gap-2">
                    <a href="{{ route('pedidos-vista') }}" class="w-auto px-5 py-1 h-10 mb-5 bg-gray-200 text-gray-700 font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Volver</a>
                    <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Modificar Pedido</button>                            
                </div>
        </div>
        <div class="grid grid-cols-2 gap-4"> <!-- Grid con 3 columnas y gap de 6 -->
        <div class="col-span-1 bg-white">
                <div class="bg-gray-200 text-gray-800 text-center py-2 rounded-t-md">
                    Detalles de la venta
                </div>
                <div class="p-6 rounded-b-md shadow-md">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Producto -->
                        <div class="mb-3">
                            <label for="producto_id" class="block text-sm font-medium text-gray-700">Producto</label>
                            <select name="productos[]" id="producto_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected> -</option>
                                @foreach ($Productos as $producto)
                                    <option value="{{$producto->id_producto}}-{{$producto->cantidad_producto}}-{{$producto->precio_venta_producto}}">
                                        {{$producto->nombre_producto}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        

                        <!-- Stock -->
                        <div class="flex justify-end">
                            <div class="w-full sm:w-1/2">
                                <label for="disponible" class="block text-sm font-medium text-gray-700">Disponible</label>
                                <input disabled id="cantidad_producto" type="text" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Precio de venta -->
                        <div>
                            <label for="precio_venta_producto" class="block text-sm font-medium text-gray-700">Precio de venta</label>
                            <input disabled type="number" name="precio_venta_producto" id="precio_venta_producto" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" step="0.1">
                        </div>

                        <!-- Cantidad -->
                        <div>
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                        </div>


                        <!-- Botón para agregar -->
                        <div class="text-right">
                            <button id="btn_agregar" class="px-4 py-2 bg-gray-800 text-white rounded-md shadow hover:bg-blue-600 transition" type="button">
                                Agregar
                            </button>
                        </div>

                        <!-- Tabla para el detalle de la venta -->
                        <div>
                            <div class="overflow-x-auto">
                                <table id="tabla_detalle" class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">#</th>
                                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Producto</th>
                                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Cantidad</th>
                                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Precio venta</th>
                                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Descuento</th>
                                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Subtotal</th>
                                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300">
                                        @foreach ($Pedido->detallePedido as $detalle)
                                        <tr>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2">{{ $detalle->producto->nombre_producto }}</td>
                                            <td class="px-4 py-2">{{ $detalle->cantidad }}</td>
                                            <td class="px-4 py-2">{{ $detalle->producto->precio_venta_producto }}</td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2">{{ $detalle->subtotal }}</td>
                                            <td class="px-4 py-2"><button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700 transition" type="button" onClick="eliminarProducto(' + {{ $Pedido->producto}} + ')"><i class="fa-solid fa-trash"></i></button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td colspan="4" class="px-4 py-2 text-right font-medium">Subtotal</td>
                                            <input type="number" name="subtotal_pedido" id="subtotal_pedido" class="hidden">
                                            <td colspan="2" class="px-4 py-2"><span id="sumas">0</span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="4" class="px-4 py-2 text-right font-medium">IVA %</td>
                                            <td colspan="2" class="px-4 py-2"><span id="igv">0</span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="4" class="px-4 py-2 text-right font-medium">Total</td>
                                            <td colspan="2" class="px-4 py-2">
                                                <input type="hidden" name="total_pedido" value="0" id="total_pedido">
                                                <span id="total">0</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <!-- Botón para cancelar venta -->
                        <div>
                            <button id="cancelar" type="button" class="px-4 py-2 bg-red-500 text-white rounded-md shadow hover:bg-red-600 transition">
                                Cancelar venta
                            </button>
                        </div>

                    </div>            
                </div>
            </div>
            <div class="col-span-1 bg-white">
                <div class="bg-gray-200 text-gray-800 text-center py-2 rounded-t-md">
                    Datos generales
                </div>
                <div class="p-6 border rounded-b-md shadow-md">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Número de comprobante -->
                        <div>
                            <label for="nombre_cliente" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
                            <input required type="text" name="nombre_cliente" id="nombre_cliente" value="{{ $Pedido->cliente->nombre_cliente }}" class="block w-full px-4 py-2 text-gray-700 bg-white  border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Número de comprobante -->
                        <div>
                            <label for="numero_comprobante" class="block text-sm font-medium text-gray-700">Tipo de Envío</label>
                            <input required type="text" name="numero_comprobante" id="numero_comprobante" class="block w-full px-4 py-2 text-gray-700 bg-white  border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Método de Pago -->
                        <div>
                            <label for="fk_id_metodo_de_pago" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                            <select name="fk_id_metodo_de_pago" id="metodo_de_pago" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="{{ $Pedido->metodoPago->id_metodo_de_pago ?? 'No especificado'}}" disabled selected>{{ $Pedido->metodoPago->detalle_metodo_de_pago ?? 'No especificado'}} </option>
                                @foreach ($metodosPago as $metodo)
                                    <option value="{{$metodo->id_metodo_de_pago}}">
                                        {{$metodo->detalle_metodo_de_pago}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Número de comprobante -->
                        <div>
                            <label for="numero_comprobante" class="block text-sm font-medium text-gray-700">Número de comprobante</label>
                            <input required type="text" name="numero_comprobante" id="numero_comprobante" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Descuento -->
                        <div>
                            <label for="fk_id_descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
                            <select name="fk_id_descuento" id="descuento_id" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="" disabled selected>{{ $Pedido->descuento->codigo_de_descuento ?? 'Sin descuento'}} - {{$Pedido->descuento->porcentaje_descuento ?? 'Sin descuento'}}</option>
                                @foreach ($Descuentos as $descuento)
                                    <option value="{{$descuento->id_descuento}}">
                                        {{$descuento->codigo_de_descuento}} - {{$descuento->porcentaje_descuento}}%
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Impuesto -->
                        <div>
                            <label for="impuesto" class="block text-sm font-medium text-gray-700">Impuesto (IVA)</label>
                            <input readonly type="text" name="impuesto" id="impuesto" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('impuesto')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Detalles de la Compra -->
                        <div class="mb-4">
                            <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                            <select id="fk_id_estado" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                                <option value="3">Completado</option>
                                <option value="4">Pendiente</option>
                                <option value="5">Cancelado</option>
                            </select>
                        </div>

                        <!-- Detalles de la Compra -->
                        <div>
                            <label for="detalle_pedido" class="block text-sm font-medium text-gray-700">Detalles</label>
                            <textarea type="text" name="detalle_pedido" id="detalle_pedido" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"></textarea>
                        </div>

                        <!-- Fecha -->
                        <div class="col-sm-6">
                            <div class=w-2/3>
                                <label for="name" class="block text-sm font-medium text-gray-700">Fecha</label>
                                <div class="relative">
                                    <input type="date" name="fecha_pedido" id="fecha_pedido" value="{{ \Carbon\Carbon::parse($Pedido->fecha_pedido)->format('Y-m-d') }}" 
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                                </div>
                            </div>
                        </div>

                        <!-- Usuario -->
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <!-- Botón para guardar -->
                        <div class="text-center">
                            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600 transition">
                                Realizar venta
                            </button>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</form>

<script>   
    document.addEventListener('DOMContentLoaded', function () {
        new TomSelect('#producto_id', {
            placeholder: 'Buscar producto...',
            maxOptions: 100, // Número máximo de opciones visibles en el dropdown
            searchField: ['text'], // Campo que se usará para buscar
            allowEmptyOption: true, // Permitir la opción vacía
        });
    });

    $(document).ready(function() {

        $('#producto_id').change(mostrarValores);


        $('#btn_agregar').click(function() {
            agregarProducto();
        });

        $('#btnCancelarVenta').click(function() {
            cancelarVenta();
        });

        disableButtons();

        $('#impuesto').val(impuesto + '%');
    });

    //Variables
    let cont = 0;
    let subtotal = [];
    let sumas = 0;
    let igv = 0;
    let total = 0;

    //Constantes
    const impuesto = 13;

    function mostrarValores() {
        let dataProducto = document.getElementById('producto_id').value.split('-');
        $('#cantidad_producto').val(dataProducto[1]);
        $('#precio_venta_producto').val(dataProducto[2]);
    }

    function agregarProducto() {
        let dataProducto = document.getElementById('producto_id').value.split('-');
        //Obtener valores de los campos
        let idProducto = dataProducto[0];
        let nameProducto = $('#producto_id option:selected').text();
        let cantidad_producto = $('#cantidad_producto').val();
        let precioVenta = $('#precio_venta_producto').val();        
        let descuento = $('#descuento').val();
        let cantidad = $('#cantidad').val();
        descuento = 0;
        if (descuento == '') {
            descuento = 0;
        }
        //Validaciones 
        //1.Para que los campos no esten vacíos
        if (idProducto != '' && cantidad != '') {
            //2. Para que los valores ingresados sean los correctos
            if (parseInt(cantidad) > 0 && (cantidad % 1 == 0) && parseFloat(descuento) >= 0) {

                //3. Para que la cantidad no supere el stock
                if (parseInt(cantidad) <= parseInt(cantidad_producto)) {
                    //Calcular valores
                    subtotal[cont] = round(cantidad * precioVenta - descuento);
                    sumas += subtotal[cont];
                    igv = round(sumas / 100 * impuesto);
                    total = round(sumas + igv);
                    //Crear la fila
                    let fila = '<tr id="fila' + cont + '">' +
                        '<th>' + (cont + 1) + '</th>' +
                        '<td><input type="hidden" name="arrayidproducto[]" value="' + idProducto + '">' + nameProducto + '</td>' +
                        '<td><input type="hidden" name="arraycantidad[]" value="' + cantidad + '">' + cantidad + '</td>' +
                        '<td><input type="hidden" name="arrayprecioventa[]" value="' + precioVenta + '"> ₡' + parseFloat(precioVenta).toLocaleString('es-CR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</td>' +                        
                        '<td><input type="hidden" name="arraydescuento[]" value="₡' + descuento + '">₡' + parseFloat(descuento).toLocaleString('es-CR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</td>' +
                        '<td>₡' + parseFloat(subtotal[cont]).toLocaleString('es-CR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</td>' +
                        '<td><button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700 transition" type="button" onClick="eliminarProducto(' + cont + ')"><i class="fa-solid fa-trash"></i></button></td>' +
                        '</tr>';

                    //Acciones después de añadir la fila
                    $('#tabla_detalle').append(fila);

                    // Actualizar los campos ocultos
                    actualizarCamposOcultos();
                    limpiarCampos();
                    cont++;
                    disableButtons();

                    //Mostrar los campos calculados
                    $('#sumas').html(sumas);
                    $('#igv').html(igv);
                    document.getElementById('subtotal_pedido').value = sumas;  
                    document.getElementById('total_pedido').value = total;                   
                    $('#total').html(total);
                    $('#impuesto').val(igv);
                    $('#inputTotal').val(total);
                } /*else {
                    showModal('Cantidad incorrecta');
                }*/

            } /*else {
                showModal('Valores incorrectos');
            }*/

        } /*else {
            showModal('Le faltan campos por llenar');
        }*/

    }

    function actualizarCamposOcultos() {
        let productos = [];
        let cantidades = [];
        let precios = [];
        let descuentos = [];

        // Recorrer las filas de la tabla y obtener los valores
        $('#tabla_detalle tbody tr').each(function() {
            let idProducto = $(this).find('input[name="arrayidproducto[]"]').val();
            let cantidad = $(this).find('input[name="arraycantidad[]"]').val();
            let precio = $(this).find('input[name="arrayprecioventa[]"]').val();
            let descuento = $(this).find('input[name="arraydescuento[]"]').val();

            if (idProducto) {
                productos.push(idProducto);
                cantidades.push(cantidad);
                precios.push(precio);
                descuentos.push(descuento);
            }
        });

        // Actualizar los campos ocultos
        $('#productos').val(JSON.stringify(productos));
        $('#cantidades').val(JSON.stringify(cantidades));
        $('#precios').val(JSON.stringify(precios));
        $('#descuentos').val(JSON.stringify(descuentos));
    }

    function eliminarProducto(indice) {
        //Calcular valores
        sumas -= round(subtotal[indice]);
        igv = round(sumas / 100 * impuesto);
        total = round(sumas + igv);

        //Mostrar los campos calculados
        $('#sumas').html(sumas);
        $('#igv').html(igv);
        $('#total').html(total);
        $('#impuesto').val(igv);
        $('#InputTotal').val(total);

        //Eliminar el fila de la tabla
        $('#fila' + indice).remove();

        disableButtons();
    }

    function cancelarVenta() {
        //Elimar el tbody de la tabla
        $('#tabla_detalle tbody').empty();

        //Añadir una nueva fila a la tabla
        let fila = '<tr>' +
            '<th></th>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '</tr>';
        $('#tabla_detalle').append(fila);

        //Reiniciar valores de las variables
        cont = 0;
        subtotal = [];
        sumas = 0;
        igv = 0;
        total = 0;

        //Mostrar los campos calculados
        $('#sumas').html(sumas);
        $('#igv').html(igv);
        $('#total').html(total);
        $('#impuesto').val(impuesto + '%');
        $('#inputTotal').val(total);

        limpiarCampos();
        disableButtons();
    }

    function disableButtons() {
        if (total == 0) {
            $('#guardar').hide();
            $('#cancelar').hide();
        } else {
            $('#guardar').show();
            $('#cancelar').show();
        }
    }

    function limpiarCampos() {
        let select = $('#producto_id');
        
        $('#producto_id').val('').trigger('change');
        $('#cantidad_producto').val('');
        $('#precio_venta_producto').val('');
        $('#descuento').val('');
        $('#cantidad').val('');
    }

    function showModal(message, icon = 'error') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: message
        })
    }

    function round(num, decimales = 2) {
        var signo = (num >= 0 ? 1 : -1);
        num = num * signo;
        if (decimales === 0) //con 0 decimales
            return signo * Math.round(num);
        // round(x * 10 ^ decimales)
        num = num.toString().split('e');
        num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
        // x * 10 ^ (-decimales)
        num = num.toString().split('e');
        return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
    }
    //Fuente: https://es.stackoverflow.com/questions/48958/redondear-a-dos-decimales-cuando-sea-necesario
</script>
@endsection
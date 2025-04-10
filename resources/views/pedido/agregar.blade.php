@extends('layouts.dashboard')

@section('title', 'Agregar Pedido')

@section('principal')
<form class="pt-16" action="{{ route('pedidos-create') }}" method="post">
    @csrf
    <div class="container w-full mx-auto mt-4">
        <div class="grid grid-cols-2 gap-4"> <!-- Grid con 3 columnas y gap de 6 -->
            <!-- Detalles de la venta -->
            <div class="col-span-1">
                <div class="bg-gray-800 text-white text-center py-2 rounded-t-md">
                    Detalles de la venta
                </div>
                <div class="p-6 border border-gray-800 rounded-b-md shadow-md">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Producto -->
                        <div class="mb-3">
                            <label for="producto_id" class="block text-sm font-medium text-gray-700">Producto</label>
                            <select name="productos[]" id="producto_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled selected> -</option>
                                @foreach ($Productos as $producto)
                                    <option value="{{$producto->id_producto}}-{{$producto->cantidad}}-{{$producto->precio_venta}}">
                                        {{$producto->nombre_producto}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        

                        <!-- Stock -->
                        <div class="flex justify-end">
                            <div class="w-full sm:w-1/2">
                                <label for="disponible" class="block text-sm font-medium text-gray-700">Disponible</label>
                                <input disabled id="disponible" type="text" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Precio de venta -->
                        <div>
                            <label for="precio_venta" class="block text-sm font-medium text-gray-700">Precio de venta</label>
                            <input disabled type="number" name="precio_venta" id="precio_venta" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" step="0.1">
                        </div>

                        <!-- Cantidad -->
                        <div>
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                        </div>

                        <!-- Descuento -->
                        <div>
                            <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
                            <input type="number" name="descuento" id="descuento" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
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
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="px-4 py-2 text-left">#</th>
                                            <th class="px-4 py-2 text-left">Producto</th>
                                            <th class="px-4 py-2 text-left">Cantidad</th>
                                            <th class="px-4 py-2 text-left">Precio venta</th>
                                            <th class="px-4 py-2 text-left">Descuento</th>
                                            <th class="px-4 py-2 text-left">Subtotal</th>
                                            <th class="px-4 py-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td colspan="4" class="px-4 py-2 text-right font-medium">Sumas</td>
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
                                                <input type="hidden" name="total" value="0" id="inputTotal">
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

            
        

            <div class="col-span-1">
                <div class="bg-gray-800 text-white text-center py-2 rounded-t-md">
                    Datos generales
                </div>
                <div class="p-6 border border-gray-800 rounded-b-md shadow-md">
                    <div class="grid grid-cols-1 gap-6">

                        <!-- Número de comprobante -->
                        <div>
                            <label for="numero_comprobante" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
                            <input required type="text" name="numero_comprobante" id="numero_comprobante" class="block w-full px-4 py-2 text-gray-700 bg-white  border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
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

                        <!-- Número de comprobante -->
                        <div>
                            <label for="numero_comprobante" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                            <input required type="text" name="numero_comprobante" id="numero_comprobante" class="block w-full px-4 py-2 text-gray-700 bg-white  border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Número de comprobante -->
                        <div>
                            <label for="numero_comprobante" class="block text-sm font-medium text-gray-700">Número de comprobante</label>
                            <input required type="text" name="numero_comprobante" id="numero_comprobante" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Impuesto -->
                        <div>
                            <label for="impuesto" class="block text-sm font-medium text-gray-700">Impuesto (IVA)</label>
                            <input readonly type="text" name="impuesto" id="impuesto" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('impuesto')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Impuesto -->
                        <div>
                            <label for="impuesto" class="block text-sm font-medium text-gray-700">Estado</label>
                            <input readonly type="text" name="impuesto" id="impuesto" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('impuesto')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Detalles de la Compra -->
                        <div>
                            <label for="impuesto" class="block text-sm font-medium text-gray-700">Detalles</label>
                            <textarea type="text" name="impuesto" id="impuesto" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"></textarea>
                            @error('impuesto')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Fecha -->
                        <div class="col-sm-6">
                            <label for="fecha" class="form-label">Fecha:</label>
                            <input readonly type="date" name="fecha" id="fecha" class="form-control border-success" value="<?php echo date("Y-m-d") ?>">
                            <?php

                            use Carbon\Carbon;

                            $fecha_hora = Carbon::now()->toDateTimeString();
                            ?>
                            <input type="hidden" name="fecha_hora" value="{{$fecha_hora}}">
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
        $('#disponible').val(dataProducto[1]);
        $('#precio_venta').val(dataProducto[2]);
    }

    function agregarProducto() {
        let dataProducto = document.getElementById('producto_id').value.split('-');
        console.log($('#producto_id option:selected').text());
        //Obtener valores de los campos
        let idProducto = dataProducto[0];
        let nameProducto = $('#producto_id option:selected').text();
        let cantidad = $('#cantidad').val();
        let precioVenta = $('#precio_venta').val();
        let descuento = $('#descuento').val();
        let disponible = $('#disponible').val();

        if (descuento == '') {
            descuento = 0;
        }

        //Validaciones 
        //1.Para que los campos no esten vacíos
        if (idProducto != '' && cantidad != '') {

            //2. Para que los valores ingresados sean los correctos
            if (parseInt(cantidad) > 0 && (cantidad % 1 == 0) && parseFloat(descuento) >= 0) {

                //3. Para que la cantidad no supere el stock
                if (parseInt(cantidad) <= parseInt(disponible)) {
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
                        '<td><input type="hidden" name="arrayprecioventa[]" value="' + precioVenta + '">' + precioVenta + '</td>' +
                        '<td><input type="hidden" name="arraydescuento[]" value="' + descuento + '">' + descuento + '</td>' +
                        '<td>' + subtotal[cont] + '</td>' +
                        '<td><button class="btn btn-danger" type="button" onClick="eliminarProducto(' + cont + ')"><i class="fa-solid fa-trash">ds</i></button></td>' +
                        '</tr>';

                    //Acciones después de añadir la fila
                    $('#tabla_detalle').append(fila);
                    limpiarCampos();
                    cont++;
                    disableButtons();

                    //Mostrar los campos calculados
                    $('#sumas').html(sumas);
                    $('#igv').html(igv);
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

        $('#cantidad').val('');
        $('#precio_venta').val('');
        $('#descuento').val('');
        $('#disponible').val('');
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

@extends('layouts.app')

@section('title', 'Carrito')

<style>
  /* Para navegadores WebKit (Chrome, Safari, Edge) */
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Para Firefox */
  input[type="number"] {
    -moz-appearance: textfield;
  }
</style>

@section('contentt')
<div class="mx-64 mt-10">
    <div class="bg-white p-8">
        <table class="min-w-full bg-white">
            <thead class="border-b border-gray-200">
                <tr>
                    <th class="py-2 text-left">Producto</th>
                    <th class="py-2 text-center">Precio</th>
                    <th class="py-2">Cantidad</th>
                    <th class="py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200">
                    <td class="py-2">
                        <div class="flex items-center">
                            <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto 1" class="w-40 h-40 object-cover rounded-lg">
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Producto 1</h3>
                                <p class="text-gray-600">Talla: 7</p>
                                <p class="text-gray-600">Descripción:</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 text-center">$99.99</td>
                    <td class="py-2">
                        <div class="flex items-center justify-center">
                            <div class="flex items-center justify-between bg-white border-2 border-black rounded-full p-2">
                                <button class="text-gray-700 px-2 py-1 ">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" value="1" class="w-12 text-center border-none outline-none mx-2">
                                <button class="text-gray-700 px-2 py-1">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 text-center">$99.99</td>
                </tr>
                <tr class="border-b border-gray-200">
                    <td class="py-2">
                        <div class="flex items-center">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto 2" class="w-40 h-40 object-cover rounded-lg">
                        <div class="ml-4">
                                <h3 class="text-lg font-semibold">Producto 2</h3>
                                <p class="text-gray-600">Talla: 7</p>
                                <p class="text-gray-600">Descripción:</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 text-center">$79.99</td>
                    <td class="py-2">
                        <div class="flex items-center justify-center">
                                <div class="flex items-center justify-between bg-white border-2 border-black rounded-full p-2">
                                    <button class="text-gray-700 px-2 py-1 ">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" value="1" class="w-12 text-center border-none outline-none mx-2">
                                    <button class="text-gray-700 px-2 py-1">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                    </td>
                    <td class="py-2 text-center">$79.99</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-6" style="padding-left:80%;">
            <div class="flex justify-between items-center mb-4">
                <p class="text-lg font-semibold">Subtotal:</p>
                <p class="text-lg font-semibold">$179.98</p>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600">
                    <span class="ml-2">Acepto los <a href="#" class="text-blue-600 underline">términos y condiciones</a></span>
                </label>
            </div>
            <button class="w-full bg-gray-800  text-white py-2 rounded-lg hover:bg-gray-900 transition duration-300">Pagar</button>
        </div>
    </div>
</div>

@endsection

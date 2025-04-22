<?php
$sumaTotales = 0;
foreach($pedidos as $pedido) {
   $sumaTotales += $pedido->total_pedido;
}
?>

@extends('layouts.dashboard')

@section('principal')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-2">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Pedidos Hechos -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-purple-500 text-white rounded-full p-4">
                    <i class="fa-solid fa-bag-shopping text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Pedidos Hechos</h2>
                    <p class="text-2xl font-bold text-gray-800">{{ count($pedidos) }} </p>
                </div>
            </div>
        </div>

        <!-- Ventas Totales -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-green-500 text-white rounded-full p-4">
                    <i class="fa-solid fa-money-bill-wave text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Ventas Totales</h2>
                    <p class="text-2xl font-bold text-gray-800">₡{{ number_format($sumaTotales, 0, '.', ',') }}</p>
                </div>
            </div>
        </div>

        <!-- Productos Disponibles -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-blue-500 text-white rounded-full p-4">
                    <i class="fa-solid fa-boxes-stacked text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Productos Disponibles</h2>
                    <p class="text-2xl font-bold text-gray-800">{{ count($productos) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
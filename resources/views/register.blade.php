@extends('layouts.app')

@section('title', 'Registrarse')

@section('contentt')
<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>
        <form action="register.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre Completo</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="cedula" class="block text-gray-700">Cédula</label>
                <input type="text" id="cedula" name="cedula" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Número de Celular</label>
                <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="address1" class="block text-gray-700">Dirección 1</label>
                <input type="text" id="address1" name="address1" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="address2" class="block text-gray-700">Dirección 2</label>
                <input type="text" id="address2" name="address2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                    <label for="terms" class="ml-2 block text-gray-900">Acepto los <a href="#" class="text-blue-600 hover:underline">términos y condiciones</a></label>
                </div>
            </div>
            <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900 transition duration-300">Registrarse</button>
        </form>
        <p class="mt-6 text-center text-gray-700">¿Ya tienes una cuenta? <a href="{{ url('/login/') }}" class="text-blue-600 hover:underline">Inicia Sesión</a></p>
    </div>
</div>
@endsection
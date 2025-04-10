@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('contentt')
<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Inicio de Sesión</h2>
        <form action="{{ route('/login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="correo" class="block text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="correo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-gray-900">Recuérdame</label>
                </div>
                <a href="#" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900 transition duration-300">Iniciar Sesión</button>
        </form>
        <p class="mt-6 text-center text-gray-700">¿No tienes una cuenta? <a href="{{ url('/register/') }}" class="text-blue-600 hover:underline">Regístrate</a></p>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    </div>
</div>

@endsection


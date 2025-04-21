@extends('layouts.dashboard')

@section('principal')
<div class="flex h-full">
    <div class="container">
        <div class="flex h-full">
            <!-- Sidebar -->
            <div class="h-full w-48 bg-gray-100 p-4 space-y-4">
                <h2 class="text-lg font-semibold">Configuración</h2>
                <nav class="space-y-2">
                    <button class="w-full text-left px-2 py-2 rounded-lg hover:bg-gray-200" onclick="showTab('profile')">
                        Perfil
                    </button>
                    <button class="w-full text-gray-500 text-left px-2 py-2 rounded-lg"> <!-- onclick="showTab('security') -->
                        Mi Negocio
                    </button>
                    <button class="w-full text-gray-500 text-left px-2 py-2 rounded-lg"> <!-- onclick="showTab('prefepreferencesrences') -->
                        Página Web
                    </button>        
                    <button class="w-full text-gray-500 text-left px-2 py-2 rounded-lg"> <!-- onclick="showTab('preferences') -->
                        Preferencias
                    </button>
                </nav>
            </div>
            
            <!-- Content Area -->
            <div class="flex-1 pt-4">
                <!-- Perfil -->
                <div id="profile" class="tab-content">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold">Mi Perfil</h2>
                            <a href="{{ url('/usuarios/modificar/' . auth()->user()->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                                Modificar
                            </a>
                        </div>
                        <div class="flex items-center space-x-6 mb-6">
                            <!-- Imagen del usuario -->
                            <div class="w-24 h-24">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7awcQZRnbrToH9Hwkh9NsbbAlGThRcfHvCA&s" alt="Imagen del usuario" class="w-full h-full rounded-full object-cover">
                            </div>
                        </div>

                        <!-- Información del usuario -->
                        <div class="space-y-4">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                <div class="relative">
                                    <input type="text" id="name" value="{{ auth()->user()->nombre }}" 
                                        class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" 
                                        readonly>
                                </div>
                           </div>

                            <!-- Apellidos -->
                            <div>
                                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                <input type="text" id="apellidos" value="{{ auth()->user()->apellidos }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>

                            <!-- Correo -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                                <input type="email" id="email" value="{{ auth()->user()->email }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                <input type="text" id="phone" value="{{ auth()->user()->telefono ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>

                            <!-- Estado -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 pb-2">Estado</label>
                                <span class="px-3 py-2 text-xs rounded-full {{ auth()->user()->fk_id_estado ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}"> {{ auth()->user()->fk_id_estado ? 'Activa' : 'Inactiva' }} </span>                            </div>
                        </div>
                    </div>
                </div>

                <div id="security" class="tab-content hidden">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold">Mi Negocio </h2>
                            <a href="{{ route('perfil-modificar-vista-sitio') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                                Modificar
                            </a>
                        </div>
                        <div class="flex items-center space-x-6 mb-6">
                            <!-- Imagen del usuario -->
                            <div class="w-24 h-24">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7awcQZRnbrToH9Hwkh9NsbbAlGThRcfHvCA&s" alt="Imagen del usuario" class="w-full h-full rounded-full object-cover">
                            </div>
                        </div>

                        <!-- Información del usuario -->
                        <div class="space-y-4">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Negocio</label>
                                <input type="text" id="name" value="{{ auth()->user()->name }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>

                            <!-- Correo -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                                <input type="email" id="email" value="{{ auth()->user()->email }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>

                            <!-- Dirección -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Dirección</label>
                                <input type="email" id="email" value="{{ auth()->user()->correo }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>

                            <!-- Misión -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Misión</label>
                                <input type="text" id="address" value="{{ auth()->user()->address ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>

                            <!-- Visión -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Visión</label>
                                <input type="text" id="phone" value="{{ auth()->user()->phone ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>
                            </div>


                            <!-- Términos y Condiciones -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Términos y Condiciones</label>
                                <textarea type="text" id="address" value="{{ auth()->user()->address ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly></textarea>
                            </div>

                            <!-- Información de Envíos -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Información de Envíos</label>
                                <textarea id="address" name="address" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"  readonly>{{ auth()->user()->address ?? 'No especificado' }}</textarea>
                            </div>

                            <!-- Política de Privacidad -->
                            <div>
                                <label for="privacy_policy" class="block text-sm font-medium text-gray-700">Política de Privacidad</label>
                                <textarea id="privacy_policy" name="privacy_policy" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>{{ auth()->user()->privacy_policy ?? 'No especificado' }}</textarea>
                            </div>

                            <!-- Cambios & Garantías -->
                            <div>
                                <label for="warranty" class="block text-sm font-medium text-gray-700">Cambios & Garantías</label>
                                <textarea id="warranty" name="warranty" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>{{ auth()->user()->warranty ?? 'No especificado' }}</textarea>
                            </div>

                            <!-- Preguntas Frecuentes -->
                            <div>
                                <label for="faq" class="block text-sm font-medium text-gray-700">Preguntas Frecuentes</label>
                                <textarea id="faq" name="faq" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>{{ auth()->user()->faq ?? 'No especificado' }}</textarea>
                            </div>


                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-xl font-semibold">Redes Sociales </h2>
                                <a href="{{ route('perfil-modificar-vista-sitio') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                                    Modificar
                                </a>
                            </div>

                            <!-- Instagram -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Instagram</label>
                                <input type="text" id="address" value="{{ auth()->user()->address ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>
                            </div>

                            <!-- Tik Tok -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Tik Tok</label>
                                <input type="text" id="address" value="{{ auth()->user()->address ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>
                            </div>

                            <!-- WhatsApp -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                                <input type="text" id="address" value="{{ auth()->user()->address ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>
                            </div>

                            <!-- YouTube -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">YouTube</label>
                                <input type="text" id="address" value="{{ auth()->user()->address ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>
                            </div>

                            <!-- Facebook -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Facebook</label>
                                <input type="text" id="address" value="{{ auth()->user()->address ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="preferences" class="tab-content hidden">
                    <h2 class="text-xl font-semibold">Preferencias</h2>
                    <p>Ajusta tus preferencias de usuario.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });
        document.getElementById(tabId).classList.remove('hidden');
    }
</script>

@endsection
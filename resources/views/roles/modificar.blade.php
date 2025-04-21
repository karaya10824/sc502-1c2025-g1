@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Pestaña Modal para modificar Rol -->
<div class=" inset-0 bg-gray-800 bg-opacity-75 pt-16 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Modificar Producto</h3>
        </div>
        <div class="p-6">
            <form action="{{ url('/roles/modificar/' . $role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre del Rol</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg" value="{{old('name',$role->name)}}" required>
                </div>

                <!---Permisos---->
                <div class="col-12">
                    <p class="text-muted">Permisos para el rol:</p>
                    @foreach ($permisos as $item)
                    @if ( in_array($item->id, $role->permissions->pluck('id')->toArray() ) )
                    <div class="form-check mb-2">
                        <input checked type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->name}}">
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div>
                    @else
                    <div class="form-check mb-2">
                        <input type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->name}}">
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div>
                    @endif
                    @endforeach
                </div>
                @error('permission')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
                
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalRol" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para modificar Rol -->

@endsection
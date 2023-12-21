@extends('layout/template')

@section('title', 'Roles')

@section('content')
<main class="mx-auto w-3/4 mt-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl">Roles</h2>
        <a href="/roles/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Rol</a>
    </div>

    @if (session('success'))
        <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('success') }}               
        </div>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2">{{ $role->description }}</td>
                    <td class="border px-4 py-2">
                        <a href="/roles/{{ $role->id }}/edit" class="text-blue-500">Editar</a> |
                        <form action="/roles/{{ $role->id }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
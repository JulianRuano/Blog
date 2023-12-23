@extends('layout/template')

@section('title', 'Categorías')

@section('content')
<main class="mx-auto w-3/4 mt-4"> 
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Categorías</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear categoría</a>
    </div>

    @if (session('success'))
        <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('success') }}               
        </div>
    @endif
    
    <div class="mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">{{ $category->description }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('categories.edit', $category) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>

@endsection
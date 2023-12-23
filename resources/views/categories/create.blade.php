@extends('layout/template')

@section('title', 'Crear categoría')

@section('content')
<main class="flex justify-center items-center h-screen bg-gray-200">
    <div class="bg-white rounded shadow p-6 m-4 w-3/4 lg:w-1/4">
        <h1 class="text-2xl font-bold mb-4">Crear categoría</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                <input type="text" name="name" id="name" placeholder="Nombre de la categoría" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                <textarea name="description" id="description" cols="30" rows="5" placeholder="Descripción de la categoría" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('categories.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Crear
                </button>
            </div>
        </form>
    </div>

</main>
@endsection
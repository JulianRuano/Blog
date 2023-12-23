@extends('layout/template')

@section('title', 'Editar Categoría')

@section('content')
<main class="flex justify-center items-center h-screen bg-gray-200">
    <div class="bg-white rounded-lg shadow-lg w-1/3">
        <div class="bg-gray-200 border-b p-3">
            <h1 class="text-gray-700 font-bold">Editar Categoría</h1>
        </div>
        <div class="p-5">
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="bg-gray-200 border-2 w-full p-3 rounded-lg @error('name') border-red-500 @enderror">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Descripción</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="bg-gray-200 border-2 w-full p-3 rounded-lg @error('description') border-red-500 @enderror">{{ $category->description }}</textarea>
                    @error('description')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar Categoría</button>
            </form>
        </div>
    </div>

</main>
@endsection
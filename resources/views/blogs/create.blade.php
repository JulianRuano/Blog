@extends('layout/template')

@section('title', 'Crear Blog')

@section('content')
<main class="flex justify-center items-center h-screen bg-gray-200">
    <div class="bg-white p-6 rounded shadow-md w-1/3">
        <h2 class="text-2xl mb-4">Crear Blog</h2>
        @if ($errors->any())
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Errores
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mb-4">
                <p><strong>Por favor corrige los siguientes errores:</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="list-disc ml-4">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/blogs" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Titulo:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="title" type="text" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Descripción:</label>
                <textarea name="description" id="description" cols="10" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-10">{{ old('description') }}</textarea>
            </div>              
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Categoría:</label>
                <select name="category_id" id="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">Slug:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="slug" type="text" name="slug" value="{{ old('slug') }}">
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Contenido:</label>
                <textarea name="content" id="content" cols="30" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-20">{{ old('description') }}</textarea>
            </div>


            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Imagen:</label>
                <input type="file" name="image" id="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-20">
                <img id="preview" class="mt-2" src="" alt="Imagen" width="300px">
            </div>


            <div class="flex items-center justify-between">
                <a href="/users" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Crear Blog
                </button>
            </div>
        </form>
    </div>
    <script>
        const image = document.getElementById('image');
        const preview = document.getElementById('preview');
        image.addEventListener('change', function(e){
            const url = URL.createObjectURL(e.target.files[0]);
            preview.src = url;
        });
    </script>
</main>
@endsection
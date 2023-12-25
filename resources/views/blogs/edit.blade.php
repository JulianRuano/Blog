@extends('layout/template')

@section('title', 'Editar Blog')

@section('content')
<main class="flex justify-center items-center h-screen bg-gray-200">
    <div class="w-2/3 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-4xl font-bold text-center mb-8">Editar Blog</h1>
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
        <form action="/blogs/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="sr-only">Titulo</label>
                <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $blog->title }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror">
                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="sr-only">Descripción</label>
                <textarea name="description" id="description" cols="30" rows="2" placeholder="Descripción" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror">{{ $blog->description }}</textarea>
                @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>              
            <div class="mb-4">
                <label for="category_id" class="sr-only">Categoría</label>
                <select name="category_id" id="category_id" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('category_id') border-red-500 @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>    
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="slug" class="sr-only">Slug</label>
                <input type="text" name="slug" id="slug" placeholder="Slug" value="{{ $blog->slug }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('slug') border-red-500 @enderror">
                @error('slug')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="sr-only">Contenido</label>
                <textarea name="content" id="content" cols="30" rows="2" placeholder="Contenido" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('content') border-red-500 @enderror">{{ $contents[0]-> text}}</textarea>
                @error('content')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="sr-only">Imagen</label>
                //pedir imagen pero cargar los datos que ya estan en caso que no suba imagen
                <input type="file" name="image" id="image" accept="image/*" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('image') border-red-500 @enderror">
                <img id="preview" class="mt-2" src="{{ asset('storage/images/'.$images[0]->url)}} " alt="{{ $images[0]->alt }}" width="300px">
                @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alt" class="sr-only">Alt</label>
                <input type="text" name="alt" id="alt" placeholder="Alt" value="{{ $images[0]->alt  }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('alt') border-red-500 @enderror">
                @error('alt')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>

            <div>
                <a href="/blogs" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Editar Blog
                </button>
            </div>
        </form>
    </div>
    <script>
        const image = document.getElementById('image');
        const preview = document.getElementById('preview');
        image.addEventListener('change', function(e){
            const reader = new FileReader();
            reader.onload = function(){
                preview.src = reader.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
</main>
@endsection
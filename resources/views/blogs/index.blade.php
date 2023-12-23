@extends('layout/template')

@section('title', 'Blog')

@section('content')
<main class="mx-auto w-3/4 mt-4"> 
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl">Blog</h2>
        <a href="/blogs/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Blog</a>
    </div>

    @if (session('success'))
        <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('success') }}               
        </div>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Titulo</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Categoría</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td class="border px-4 py-2">{{ $blog->title }}</td>
                    <td class="border px-4 py-2">{{ $blog->description }}</td>
                    <td class="border px-4 py-2">{{ $blog->category->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="/blogs/{{ $blog->id }}/edit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                        <form action="/blogs/{{ $blog->id }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach       
        </tbody>
</main>

@endsection
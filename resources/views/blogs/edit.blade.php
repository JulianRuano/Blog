@extends('layout/template')

@section('title', 'Editar Blog')

@section('content')
<main class="flex justify-center items-center h-screen bg-gray-200">
    <div class="w-1/3 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-4xl font-bold text-center mb-8">Editar Usuario</h1>
        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Editar Usuario</button>
            </div>
        </form>
    </div>
</main>
@endsection
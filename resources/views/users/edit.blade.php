@extends('layout/template')

@section('title', 'Editar Usuario')

@section('content')
<main class="flex justify-center items-center h-screen bg-gray-200">
    <div class="w-1/3 bg-white rounded-lg shadow-lg p-4">
        <h1 class="text-4xl font-bold text-center mb-8">Editar Usuario</h1>
        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="sr-only">Nombre</label>
                <input type="text" name="name" id="name" placeholder="Tu nombre" value="{{ $user->name }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Correo</label>
                <input type="text" name="email" id="email" placeholder="Tu correo" value="{{ $user->email }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror">
                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="role" class="sr-only">Rol</label>
                <select name="role" id="role" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('role') border-red-500 @enderror">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}               
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Editar Usuario</button>
            </div>
        </form>
    </div>
</main>
@endsection
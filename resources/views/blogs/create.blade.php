@extends('layout/template')

@section('title', 'Crear Blog')

@section('content')
<main class="flex justify-center items-center bg-gray-200 min-h-screen">
    <div class="bg-white p-6 rounded shadow-md w-2/4 my-16">
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
        <form action="/blogs" method="POST" enctype="multipart/form-data">
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


            <div class="flex items-center justify-center w-2/3 h-32 mx-auto mb-4">
                <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer border-slate-700 bg-slate-200 hover:bg-gray-100 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-slate-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-slate-700" id="p1"><span class="font-semibold">Haga clic para cargar</span></p>
                            <p class="text-xs text-slate-700 upload" id="p2">PNG, JPG (MAX. 1920x1080px)</p>
                            <p id="file-name" class="text-xs text-slate-700 mt-2"></p>
                        </div>
                    
                    <input id="image" type="file" class="hidden" />
                </label>
            </div> 

            <div class="preview-container  justify-center max-w-80 mx-auto mb-4
            " id="image-preview-container"></div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="alt">Alt:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="alt" type="text" name="alt" value="{{ old('alt') }}">
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
        const dropzoneFileInput = document.getElementById('image');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const fileNameParagraph = document.getElementById('file-name');
        const deleteP1 = document.getElementById('p1');
        const deleteP2 = document.getElementById('p2');
    
        dropzoneFileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
    
            if (file) {
                const reader = new FileReader();
    
                reader.onload = (readerEvent) => {
                    const previewImage = document.createElement('img');
                    previewImage.src = readerEvent.target.result;
                    previewImage.classList.add('image-preview');
                    previewImage.classList.add('border-2');
                    previewImage.classList.add('rounded-lg');
                    previewImage.style.maxWidth = '320px';
                    previewImage.style.maxHeight = '240px';
    
                    fileNameParagraph.textContent = file.name;
                    deleteP1.style.display = 'none';
                    deleteP2.style.display = 'none';
                     
                    imagePreviewContainer.innerHTML = '';
                    imagePreviewContainer.appendChild(previewImage);
                };
    
                reader.readAsDataURL(file);
            }
        });
    </script>

</main>
@endsection
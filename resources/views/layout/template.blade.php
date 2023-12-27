<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="min-h-screen flex">
        <div class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-6">
                <h1 class="text-2xl font-semibold">Menú</h1>
            </div>
            <nav>
                <ul class="space-y-2 px-6">
                    <li><a href="/" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Home</a></li>
                    <li><a href="/users" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Usuarios</a></li>
                    <li><a href="/blogs" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Blogs</a></li>
                    <li><a href="/categories" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Categorias</a></li>
                    <li><a href="/roles" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Roles</a></li>
                </ul>
            </nav>
        </div>
        <div class="flex-1">
            @yield('content')
        </div>
    </div>
</body>

</html>
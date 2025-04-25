<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div class="flex space-x-8">
            <a href="{{ route('clientes.index') }}" class="text-gray-700 hover:text-gray-900">Clientes</a>
            <a href="{{ route('prestamos.index') }}" class="text-gray-700 hover:text-gray-900">Préstamos</a>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-gray-700 hover:text-gray-900">Cerrar sesión</button>
        </form>
    </div>
</nav>
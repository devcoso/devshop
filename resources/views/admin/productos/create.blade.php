<x-app-layout>
    @include('layouts.nav-admin')

    <div class="pt-8 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-3xl text-center text-gray-800 leading-tight py-6">
                    {{ __('Crear Producto') }}
                </h2>

                <div class="flex justify-start p-5 text-white">
                    <a href="{{ route('productos.index')}}" class="ml-0 md:ml-8 bg-lime-600 py-2 px-3 rounded-sm w-full text-center md:w-auto hover:bg-lime-700">
                        <i class="fa-solid fa-arrow-left"></i> Volver
                    </a>  
                </div>

                <div class="md:flex md:justify-center px-5 pb-12">
                    <livewire:crear-producto>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
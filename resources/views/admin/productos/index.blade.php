<x-app-layout>
    @include('layouts.nav-admin')

    <div class="pt-8 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-3xl text-center text-gray-800 leading-tight py-6">
                    {{ __('Productos') }}
                </h2>
                <div class="flex justify-end p-5 text-white">
                    <a href="{{ route('productos.create')}}" class="mr-0 md:mr-8  bg-lime-600 py-2 px-3 rounded-sm w-full text-center md:w-auto hover:bg-lime-700">
                        <i class="fa-solid fa-circle-plus"></i> Crear Producto
                    </a>  
                </div>

                <div class="px-5 pb-12">
                    @if (session()->has('mensaje'))
                        <div class="uppercase border-green-600 bg-green-100 text-green-700 font-bold p-2 my-3 text-sm">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="uppercase border-red-600 bg-red-100 text-red-700 font-bold p-2 my-3 text-sm">
                            {{ session('error') }}
                        </div>
                    @endif
                    <livewire:mostrar-productos>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

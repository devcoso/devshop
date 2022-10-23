<div class=" pt-3 bg-white border-gray-200 flex items-center">
    <x-nav-link-admin :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <i class="fa-solid fa-home"></i>{{ __(' Dashboard') }}
    </x-nav-link-admin>
    <x-nav-link-admin :href="route('productos.index')" :active="request()->routeIs('productos.*')">
        <i class="fa-sharp fa-solid fa-shirt"></i>{{ __(' Productos') }}
    </x-nav-link-admin>
    <x-nav-link-admin :href="route('categorias.index')" :active="request()->routeIs('categorias.*')">
        <i class="fa-sharp fa-solid fa-tag"></i>{{ __(' Categorias') }}
    </x-nav-link-admin>
    <x-nav-link-admin >
        <i class="fa-sharp fa-solid fa-boxes-stacked"></i></i>{{ __(' Pedidos') }}
    </x-nav-link-admin>
</div>
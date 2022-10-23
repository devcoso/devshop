<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='crearProducto'>
    <div>
        <x-input-label for="nombre" :value="__('Nombre del Producto')" />

        <x-text-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre" :value="old('nombre')" placeholder="Nombre Producto"/>
        @error('nombre')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion del Producto')" />

        <textarea id="descripcion" wire:model="descripcion" class="block mt-1 w-full resize-none h-40 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text"  placeholder="Descripcion"> 
            :value="old('descripcion')" 
        </textarea>
        @error('descripcion')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen del Producto')" />

        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*"/>

        <div class="my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}">                
            @endif
        </div>

        @error('imagen')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <div>
        <x-input-label for="precio" :value="__('Precio del Producto')" />

        <x-text-input id="precio" class="block mt-1 w-full" type="number" wire:model="precio" :value="old('precio')" placeholder="Precio Producto"/>
        @error('precio')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <div>
        <x-input-label for="cantidad" :value="__('Cantidad del Producto')" />

        <x-text-input id="cantidad" class="block mt-1 w-full" type="number" wire:model="cantidad" :value="old('cantidad')" placeholder="Cantidad en almacén"/>
        @error('cantidad')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <div>
        <x-input-label for="cantidad" :value="__('Categoria del Producto')" />

        <select wire:model="categoria" id="categoria" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="0">-- Seleecionar --</option>
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre}}</option>
            @endforeach
        </select>
        @error('categoria')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <x-primary-button class="w-full justify-center"> 
        Crear Producto
    </x-primary-button>
</form>


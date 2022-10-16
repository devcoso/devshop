<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editarCategoria'>
    <div>
        <x-input-label for="nombre" :value="__('Nombre de la Categoria')" />

        <x-text-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre" :value="old('nombre')" placeholder="Nombre Categoria"/>
        @error('nombre')
            <x-input-error :messages="$message" class="mt-2" />
        @enderror
    </div>
    <x-primary-button class="w-full justify-center"> 
        Guardar Cambios
    </x-primary-button>
</form>


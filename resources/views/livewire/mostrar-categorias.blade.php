<div>
    @forelse ($categorias as $categoria)
        <div class="p-6 border-gray-200 border-b flex flex-col md:flex-row md:justify-between md:items-center">
            <p class="text-xl font-bold text-gray-600">{{ $categoria->nombre}}</p>
            <div class=" text-white flex">
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="bg-blue-600 py-1 px-2 rounded-sm mr-1 hover:bg-blue-700">Editar</a>
                <button wire:click="$emit('mostrarAlerta', {{ $categoria->id }})" class="bg-red-600 py-1 px-2 rounded-lm hover:bg-red-700">Eliminar</button>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay Categorias para mostrar. Crea una</p>
    @endforelse

    <div class="mt-10">
        {{$categorias->links()}}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', categoriaId => {
            Swal.fire({
                title: '¿Eliminar categoria?',
                text: "Una categoria eliminada no se puede recuperar, y todos los prductos con esta categoria se quedarán sin categoria",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#65a30d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, ¡Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //eliminar la categoria
                Livewire.emit('eliminarCategoria', categoriaId);
                Swal.fire({
                title: 'Eliminado!',
                text: 'La categoria ha sido eliminada',
                icon: 'success',
                confirmButtonColor: '#65a30d',
                })
            }
            })    
            })
    </script>    
@endpush
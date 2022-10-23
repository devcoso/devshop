<div>
    @if (!empty($productos))
        <table class="w-full">
            <thead class=" h-9">
                <tr class=" text-center bg-gray-700 text-white">
                    <th class="hidden md:table-cell">Imagen</th>
                    <th>Producto</th>
                    <th class="hidden md:table-cell">Cantidad</th>
                    <th class="hidden md:table-cell">Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr class=" odd:bg-slate-200 even:bg-slate-400 text-center">
                        <td class="hidden md:table-cell">
                            <img src="{{ asset('/storage/productos/' . $producto->imagen ) }}" alt="{{ 'Imagen Producto ' . $producto->nombre }}" class="w-28 m-auto">
                        </td>
                        <td class="text-xl text-left p-2 md:p-0">
                           {{ $producto->nombre}}
                        </td>
                        <td class="text-xl hidden md:table-cell">
                            {{ $producto->cantidad}}
                        </td>
                        <td class="text-xl hidden md:table-cell">
                            {{ $producto->precio}}
                        </td>
                        <td class="text-white">
                            <div class="flex justify-center flex-col md:flex-row">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="bg-blue-600 py-1 px-2 rounded-sm md:mr-1 hover:bg-blue-700">Editar</a>
                                <button wire:click="$emit('mostrarAlerta', {{ $producto->id }})" class="bg-red-600 py-1 px-2 rounded-lm hover:bg-red-700">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="p-3 text-center text-sm text-gray-600">No hay productos para mostrar. Crea uno</p>
    @endif  

    <div class="mt-10">
        {{$productos->links()}}
    </div>
</div>


@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', productoId => {
            Swal.fire({
                title: '¿Eliminar producto?',
                text: "Un producto eliminado no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#65a30d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, ¡Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //eliminar la producto
                Livewire.emit('eliminarProducto', productoId);
                Swal.fire({
                title: 'Eliminado!',
                text: 'El producto ha sido eliminado',
                icon: 'success',
                confirmButtonColor: '#65a30d',
                })
            }
            })    
            })
    </script>    
@endpush
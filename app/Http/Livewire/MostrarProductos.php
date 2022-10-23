<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MostrarProductos extends Component
{
    protected $listeners= ['eliminarProducto'];

    public function eliminarProducto(Producto $producto){
        if(! Auth::user()->admin === 1) return;

        //Eliminar Imagen
        $imagenPath = public_path('storage/productos/' . $producto->imagen);
        if(File::exists($imagenPath)){
            unlink($imagenPath);
        }
        $producto->delete();
    }

    public function render()
    {
        $productos = Producto::paginate(10);
        return view('livewire.mostrar-productos', [
            'productos' => $productos,
        ]);
    }
}

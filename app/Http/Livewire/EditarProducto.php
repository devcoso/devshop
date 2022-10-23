<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EditarProducto extends Component
{
    public $producto_id;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;
    public $precio;
    public $cantidad;
    public $categoria;

    Use WithFileUploads;

    public $rules = [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string' ,
        'imagen_nueva' => 'nullable|image|max:1024',
        'precio' => 'required|integer',
        'cantidad' => 'required|integer',
        'categoria' => 'required|integer',
    ];
    
    public function mount(Producto $producto) {
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->imagen = $producto->imagen;
        $this->precio = $producto->precio;
        $this->cantidad = $producto->cantidad;
        $this->categoria = $producto->categoria_id;
    }

    public function editarProducto() {
        if(! Auth::user()->admin === 1) return;
        $datos = $this->validate();
        $producto = Producto::find($this->producto_id);

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/productos');
            $datos['imagen'] = str_replace('public/productos/', '', $imagen);
            //Eliminar Imagen
            $imagenPath = public_path('storage/productos/' . $producto->imagen);
            if(File::exists($imagenPath)){
                unlink($imagenPath);
            }
        }
        //Asignar Valores 
        $producto->nombre = $datos['nombre'];
        $producto->descripcion = $datos['descripcion'];
        $producto->imagen = $datos['imagen'] ?? $producto->imagen;
        $producto->precio = $datos['precio'];
        $producto->cantidad = $datos['cantidad'];
        $producto->categoria_id = $datos['categoria'];
        //Guardar
        $producto->save();
        //Crear un Mensaje
        session()->flash('mensaje','El Producto ha sido editado correctamente');
        //Redireccionar al Usuario
        return redirect()->route('productos.index');

    }
    
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.editar-producto', [
            'categorias' => $categorias,
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CrearProducto extends Component
{
    public $nombre;
    public $descripcion;
    public $imagen;
    public $precio;
    public $cantidad;
    public $categoria;

    Use WithFileUploads;

    public $rules = [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string' ,
        'imagen' => 'required|image|max:1024',
        'precio' => 'required|integer',
        'cantidad' => 'required|integer',
        'categoria' => 'required|integer',

    ];

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.crear-producto',[
            'categorias' => $categorias,
        ]);
    }

    public function crearProducto() {
        if(! Auth::user()->admin === 1) return;
        $datos = $this->validate();

        $imagen = $this->imagen->store('public/productos');
        $datos['imagen'] = str_replace('public/productos/', '', $imagen);

        Producto::create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'precio' => $datos['precio'],
            'cantidad' => $datos['cantidad'],
            'categoria_id' => $datos['categoria'],
        ]);

        //Crear un Mensaje
        session()->flash('mensaje','El producto se creó Correctamente');

        //Redireccionar al Usuario
        return redirect()->route('productos.index');

    }

}

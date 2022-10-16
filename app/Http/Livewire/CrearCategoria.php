<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CrearCategoria extends Component
{

    public $nombre;

    protected $rules = [
        'nombre' => 'required|string|max:50',
    ];

    public function render()
    {
        return view('livewire.crear-categoria');
    }

    public function crearCategoria() {
        if(! Auth::user()->admin === 1) return;
        $datos = $this->validate();
        //Crear Categoria 
        Categoria::create([
            'nombre' => $datos['nombre']
        ]);
        //Crear un Mensaje
        session()->flash('mensaje','La Categoria ha sido creada correctamente');

        //Redireccionar al Usuario
        return redirect()->route('categorias.index');
    }
}

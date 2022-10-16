<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class EditarCategoria extends Component
{

    public $categoria_id;
    public $nombre;


    protected $rules = [
        'nombre' => 'required|string|max:50',
    ];

    public function mount(Categoria $categoria){
        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
    }

    public function editarCategoria() {
        if(! Auth::user()->admin === 1) return;
        $datos = $this->validate();
        $categoria = Categoria::find($this->categoria_id);
        //Cambiar Categoria 
        $categoria->nombre = $datos['nombre'];
        $categoria->save();
        //Crear un Mensaje
        session()->flash('mensaje','La Categoria ha sido editada correctamente');

        //Redireccionar al Usuario
        return redirect()->route('categorias.index');
    }

    public function render()
    {
        return view('livewire.editar-categoria');
    }
}

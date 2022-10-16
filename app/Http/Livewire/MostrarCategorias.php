<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class MostrarCategorias extends Component
{

    protected $listeners = ['eliminarCategoria'];

    public function eliminarCategoria(Categoria $categoria) {
        if(! Auth::user()->admin === 1) return;

        $categoria->delete();

    }

    public function render()
    {
        $categorias = Categoria::paginate(10);
        return view('livewire.mostrar-categorias', [
            'categorias' => $categorias,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        return view('admin.categorias.index');
    }

    public function create() {
        return view('admin.categorias.create');
    }

    public function edit(Categoria $categoria) {
        return view('admin.categorias.edit', [
            'categoria' => $categoria,
        ]);
    }

}

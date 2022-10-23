<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index() {
        return view('admin.productos.index');
    }
    public function create() {
        return view('admin.productos.create');
    }
    public function edit(Producto $producto) {
        return view('admin.productos.edit',[
            'producto' =>  $producto,    
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $productuctlist=Product::all();

        return view("product.index", [
            "milista"=>$productuctlist
        ]);
    }
    public function create(){
        $category = Category::all();
        return view("product.create", [
            "myCategorias" => $category
        ]);
    }

public function store(Request $request) {
    // 1. Validar los datos (Buena práctica para evitar errores 500)
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'category_id' => 'required|exists:categories,id', // Verifica que la categoría exista
    ]);

    $newProduct = new Product();
    
    $newProduct->name = $request->input("nombre");
    $newProduct->description = $request->input("description");
    $newProduct->price = $request->input("precio");
    $newProduct->category_id = $request->input("category_id");

    $newProduct->status = $request->input('status'); 

    if ($request->hasFile("imagen")) {
        $ruta = $request->file("imagen")->store("imagenes", "public");
        $newProduct->image = $ruta;
    } else {
        $newProduct->image = "no hay ruta";
    }

    $newProduct->save(); 

    return redirect()->route('product.index')->with('success', 'Producto creado exitosamente');
}


    public function show($id){
        return view("product.show");

    }
}
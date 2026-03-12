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

    public function store(Request $request){
        $newProduct = new Product();
        $newProduct->name = $request->input("nombre");
        $newProduct->description = $request->input("description"); 
        $newProduct->price = $request->input("precio");
        $newProduct->category_id = $request->input("category_id");

        $newProduct->save();
        
        return redirect()->route('product.index');
    }


    public function show($id){
        return view("product.show");

    }
}
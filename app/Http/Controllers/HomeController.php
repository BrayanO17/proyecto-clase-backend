<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function __invoke()
   {
      $products = \App\Models\Product::where('status', 'active')->paginate(12);
      
      return view("welcome", [
         "milista" => $products
      ]);
   }
}
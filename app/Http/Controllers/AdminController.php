<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('status', 'active')->count(),
            'total_categories' => Category::count(),
            'inactive_products' => Product::where('status', 'inactive')->count(),
        ];

        $recent_products = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.index', compact('stats', 'recent_products'));
    }
}
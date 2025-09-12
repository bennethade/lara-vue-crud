<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('products/Index', []);
    }


    public function create()
    {
       return Inertia::render('products/Create', []); 
    }


    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('message', 'Product Added Successfully');

    }
}

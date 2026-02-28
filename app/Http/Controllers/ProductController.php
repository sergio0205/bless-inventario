<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required',
        'code' => 'required|unique:products,code',
        'price' => 'required|numeric|min:0',
        'stock_s' => 'required|integer|min:0',
        'stock_m' => 'required|integer|min:0',
        'stock_l' => 'required|integer|min:0',
    ]);

    Product::create($data);

    return redirect('/products')->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

// ACTUALIZAR
public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required',
        'code' => 'required|unique:products,code,' . $product->id,
        'price' => 'required|numeric|min:0',
        'stock_s' => 'required|integer|min:0',
        'stock_m' => 'required|integer|min:0',
        'stock_l' => 'required|integer|min:0',
    ]);

    $product->update($data);

    return redirect('/products')
        ->with('success', 'Producto actualizado correctamente');
}

// ELIMINAR
public function destroy(Product $product)
{
    $product->delete();

    return redirect('/products')
        ->with('success', 'Producto eliminado correctamente');
}

}

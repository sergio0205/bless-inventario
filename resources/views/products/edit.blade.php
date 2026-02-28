@extends('layouts.app')

@section('content')
<h2 class="mb-4">✏️ Editar producto</h2>

<form action="/products/{{ $product->id }}" method="POST" class="card p-4">
    @csrf
    @method('PUT')

    <div class="mb-2">
        <label>Nombre</label>
        <input class="form-control" name="name" value="{{ $product->name }}" required>
    </div>

    <div class="mb-2">
        <label>Código</label>
        <input class="form-control" name="code" value="{{ $product->code }}" required>
    </div>

    <div class="mb-2">
        <label>Precio</label>
        <input class="form-control" name="price" value="{{ $product->price }}" required>
    </div>

    <div class="mb-2">
        <label>Stock S</label>
        <input class="form-control" name="stock_s" value="{{ $product->stock_s }}" required>
    </div>

    <div class="mb-2">
        <label>Stock M</label>
        <input class="form-control" name="stock_m" value="{{ $product->stock_m }}" required>
    </div>

    <div class="mb-3">
        <label>Stock L</label>
        <input class="form-control" name="stock_l" value="{{ $product->stock_l }}" required>
    </div>

    <button class="btn btn-success">Actualizar</button>
    <a href="/products" class="btn btn-secondary">Volver</a>
</form>
@endsection
@extends('layouts.app')

@section('content')
<h2 class="mb-4">➕ Crear producto</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/products" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="code" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" name="price" step="0.01" class="form-control" required>
    </div>

    <div class="row">
        <div class="col">
            <label class="form-label">Stock S</label>
            <input type="number" name="stock_s" class="form-control" min="0" required>
        </div>
        <div class="col">
            <label class="form-label">Stock M</label>
            <input type="number" name="stock_m" class="form-control" min="0" required>
        </div>
        <div class="col">
            <label class="form-label">Stock L</label>
            <input type="number" name="stock_l" class="form-control" min="0" required>
        </div>
    </div>

    <div class="mt-4">
        <button class="btn btn-success">💾 Guardar</button>
        <a href="/products" class="btn btn-secondary">⬅ Volver</a>
    </div>
</form>
@endsection
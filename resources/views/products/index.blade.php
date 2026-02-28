@extends('layouts.app')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">📦 Productos</h4>

            <a href="/products/create" class="btn btn-primary">
                ➕ Crear producto
            </a>
        </div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
<table class="table table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Precio</th>
            <th>Stock S</th>
            <th>Stock M</th>
            <th>Stock L</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->code }}</td>
    <td>${{ $product->price }}</td>
    <td>{{ $product->stock_s }}</td>
    <td>{{ $product->stock_m }}</td>
    <td>{{ $product->stock_l }}</td>

    <td>
        <!-- EDITAR -->
        <a href="/products/{{ $product->id }}/edit"
           class="btn btn-sm btn-warning">
            Editar
        </a>

        <!-- ELIMINAR -->
        <form action="/products/{{ $product->id }}"
              method="POST"
              style="display:inline">
            @csrf
            @method('DELETE')

            <button class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Eliminar producto?')">
                Eliminar
            </button>
        </form>
    </td>
</tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">
                    No hay productos registrados
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">🛒 Crear pedido</h4>
        </div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="/orders" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <select name="client_id" class="form-select" required>
            <option value="">Seleccione un cliente</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">
                    {{ $client->name }} ({{ $client->document }})
                </option>
            @endforeach
        </select>
    </div>

    <hr>

    <h5>Productos</h5>

    <div class="row align-items-end mb-3">
        <div class="col">
            <label class="form-label">Producto</label>
            <select name="items[0][product_id]" class="form-select" required>
                <option value="">Seleccione</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} (${{ $product->price }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col">
            <label class="form-label">Talla</label>
            <select name="items[0][size]" class="form-select" required>
                <option value="">-</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
            </select>
        </div>

        <div class="col">
            <label class="form-label">Cantidad</label>
            <input type="number" name="items[0][quantity]" class="form-control" min="1" required>
        </div>
    </div>

    <button class="btn btn-success">💾 Crear pedido</button>
</form>
</div>
</div>
@endsection
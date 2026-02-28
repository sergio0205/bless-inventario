@extends('layouts.app')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">📊 Reporte de ventas</h4>
        </div>
    
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">Total vendido</small>
                <h3 class="fw-bold text-success mb-0">
                    ${{ number_format($totalSold, 2) }}
                </h3>
            </div>
        </div>
    </div>
</div>

<form method="GET" class="row g-3 mb-4">
    <div class="col-md-4">
        <label class="form-label">Desde</label>
        <input type="date" name="from" class="form-control" value="{{ request('from') }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Hasta</label>
        <input type="date" name="to" class="form-control" value="{{ request('to') }}">
    </div>

    <div class="col-md-4 d-flex align-items-end">
        <button class="btn btn-primary w-100">🔍 Filtrar</button>
    </div>
</form>

<div class="alert alert-success">
    <strong>Total vendido:</strong> ${{ number_format($totalSold, 2) }}
</div>

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>ID Pedido</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
            <tr>
    <td>{{ $order->id }}</td>
    <td>{{ $order->client->name }}</td>
    <td>${{ number_format($order->total, 2) }}</td>
    <td>{{ $order->created_at->format('Y-m-d') }}</td>

    <td>
        <a href="/orders/{{ $order->id }}/edit"
           class="btn btn-sm btn-warning">
            Editar
        </a>
        
        <form action="/orders/{{ $order->id }}"
              method="POST"
              style="display:inline">
            @csrf
            @method('DELETE')

            <button class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Eliminar pedido? Esto devolverá stock.')">
                Eliminar
            </button>
        </form>
    </td>
</tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">
                    No hay ventas en este rango
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
@endsection
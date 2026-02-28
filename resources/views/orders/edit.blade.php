@extends('layouts.app')

@section('content')
<h2 class="mb-4">✏️ Editar pedido #{{ $order->id }}</h2>

<form action="/orders/{{ $order->id }}" method="POST" class="card p-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Cliente</label>
        <select name="client_id" class="form-select" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    @selected($client->id == $order->client_id)>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Actualizar</button>
    <a href="/reports/sales/view" class="btn btn-secondary">Volver</a>
</form>
@endsection
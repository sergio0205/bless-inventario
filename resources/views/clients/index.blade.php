@extends('layouts.app')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">👤 Clientes</h4>

            <a href="/clients/create" class="btn btn-primary">
                ➕ Crear cliente
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
            <th>Documento</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($clients as $client)
    <tr>
        <td>{{ $client->id }}</td>
        <td>{{ $client->document }}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->address }}</td>
        <td>{{ $client->phone }}</td>

        <td>
            <!-- BOTÓN EDITAR -->
            <a href="/clients/{{ $client->id }}/edit"
               class="btn btn-sm btn-warning">
                Editar
            </a>

            <!-- BOTÓN ELIMINAR -->
            <form action="/clients/{{ $client->id }}"
                  method="POST"
                  style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar este cliente?')">
                    Eliminar
                </button>
            </form>
        </td>
    </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    No hay clientes registrados
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
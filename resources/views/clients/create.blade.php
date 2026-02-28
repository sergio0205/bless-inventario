@extends('layouts.app')

@section('content')
<h2 class="mb-4">➕ Crear cliente</h2>

{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/clients" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Documento</label>
        <input type="text" name="document" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Dirección</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mt-3">
        <button class="btn btn-success">💾 Guardar cliente</button>
        <a href="/clients" class="btn btn-secondary">⬅ Volver</a>
    </div>
</form>
@endsection
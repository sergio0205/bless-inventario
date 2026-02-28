@extends('layouts.app')

@section('content')
<h2>✏️ Editar cliente</h2>

<form action="/clients/{{ $client->id }}" method="POST" class="card p-4">
    @csrf
    @method('PUT')

    <input name="document" class="form-control mb-2" value="{{ $client->document }}" required>
    <input name="name" class="form-control mb-2" value="{{ $client->name }}" required>
    <input name="address" class="form-control mb-2" value="{{ $client->address }}" required>
    <input name="phone" class="form-control mb-3" value="{{ $client->phone }}" required>

    <button class="btn btn-success">Actualizar</button>
</form>
@endsection
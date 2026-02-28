<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // LISTAR CLIENTES
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // FORMULARIO CREAR
    public function create()
    {
        return view('clients.create');
    }

    // GUARDAR NUEVO CLIENTE
    public function store(Request $request)
    {
        $data = $request->validate([
            'document' => 'required|unique:clients,document',
            'name'     => 'required',
            'address'  => 'required',
            'phone'    => 'required',
        ]);

        Client::create($data);

        return redirect('/clients')->with('success', 'Cliente creado correctamente');
    }

    // FORMULARIO EDITAR
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // ACTUALIZAR CLIENTE
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'document' => 'required|unique:clients,document,' . $client->id,
            'name'     => 'required',
            'address'  => 'required',
            'phone'    => 'required',
        ]);

        $client->update($data);

        return redirect('/clients')->with('success', 'Cliente actualizado correctamente');
    }

    // ELIMINAR CLIENTE
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/clients')->with('success', 'Cliente eliminado correctamente');
    }
}
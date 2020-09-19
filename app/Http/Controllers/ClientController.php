<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::orderBy('nome')
        ->paginate(1);

        return view('client.list', compact('clients'));
    }

    public function create()
    {
        return view('client.update');
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->all());

        return redirect('client')
            ->withSuccess('Cliente cadastrado com sucesso');
    }

    public function show(Client $client)
    {
        return view('client.show' , compact('client'));
    }

    public function edit(Client $client)
    {
        return view('client.update' , [
            'clients' =>  $client,
        ]);
    }

    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect('client')->withSuccess('Cliente atualizado com sucesso');
    }

    public function destroy(Client $client)
    {

        $client->destroy($client->id);

        return redirect('client')->withSuccess('Cliente deletado com sucesso');
    }
}
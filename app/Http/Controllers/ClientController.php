<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Validator;

class ClientController extends Controller
{

    public function index()
    {
        return view('client');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'nome' => 'required',
            'email'=> 'required',
            'data' => 'required',
            'sobre'=> 'required',
        ]);

        $client = new client;
        $client->nome = $request->input('nome');
        $client->email = $request->input('email');
        $client->data = $request->input('data');
        $client->sobre = $request->input('sobre');
        $client->save();

        return redirect('home')->with('success', 'Cliente Cadastrado!');
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
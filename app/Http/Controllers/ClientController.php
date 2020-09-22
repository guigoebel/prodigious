<?php

namespace App\Http\Controllers;

use App\Client;
use App\Images;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::orderBy('nome')
        ->with('images')
        ->paginate(1);

        return view('client.list', compact('clients'));
    }

    public function create()
    {
        return view('client.update');
    }

    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());

        if ($request->hasfile('files')) {
            $this->uploadImages($request, $client);
        }

        return redirect('client')
            ->withSuccess('Cliente cadastrado com sucesso');
    }

    public function show(Client $client)
    {
        return view('client.show' , compact('client'));
    }

    public function edit(Client $client)
    {

        $client = $client->load('images');

        return view('client.update' , [
            'clients' =>  $client,
        ]);
    }

    public function update(ClientRequest $request, Client $client)
    {
        $client = $client->load('images');

        $client->update($request->all());

        if ($request->hasfile('files')) {
            $this->uploadImages($request, $client);
        }

        return redirect('client')->withSuccess('Cliente atualizado com sucesso');
    }

    public function destroy(Client $client)
    {

        $client->destroy($client->id);

        return redirect('client')->withSuccess('Cliente deletado com sucesso');
    }

    public function uploadImages(Request $request, Client $client){

        $validated = $request->validate([
            'files.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ],[
            'files.*.mimes' => 'Only jpeg, png, jpg and bmp images are allowed',
            'files.*.max' => 'Sorry! Maximum allowed size for an image is 2MB',
        ]);

        $files = $request->file('files');
            foreach($files as $file) {

                $image = new Images;

                $image->client_id = $client->id;
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $name, 'public');
                $image->imagem = $path;
                $image->save();
            }
    }

}

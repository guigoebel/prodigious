<?php

namespace App\Http\Controllers;

use App\Client;
use App\Images;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Repositories\ClientRepositoryInterface;

class ClientController extends Controller
{

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository){
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients = null;

        try{
            $clients = $this->clientRepository->allPaginated(5);
        }catch(Exception $e){
            return redirect()->route('home')->with('error');
        }

        return view('client.list', compact('clients'));
    }

    public function create()
    {
        return view('client.update');
    }

    public function store(ClientRequest $request)
    {
        try{
            $client = Client::create($request->all());

            if ($request->hasfile('files')) {
                $this->uploadImages($request, $client);
            }
        }catch(Exception $e){
            return redirect()->route('home')->with('error');
        }

        return redirect('client')
            ->withSuccess('Cliente cadastrado com sucesso');
    }

    public function show(Client $client)
    {
        try{
            $client = $this->clientRepository->findById($client->id);
        }catch(Exception $e){
            return redirect()->route('home')->with('error');
        }

        return view('client.show' , compact('client'));
    }

    public function edit(Client $client)
    {
        try{
            $client = $this->clientRepository->findById($client->id);
        }catch(Exception $e){
            return redirect()->route('home')->with('error');
        }

        return view('client.update' , [
            'clients' =>  $client,
        ]);
    }

    public function update(ClientRequest $request, Client $client)
    {
        try{
            $client = $this->clientRepository->findById($client->id);

            $client->update($request->all());

            if ($request->hasfile('files')) {
                $this->uploadImages($request, $client);
            }

        }catch(Exception $e){
            return redirect()->route('home')->with('error');
        }

        return redirect('client')->withSuccess('Cliente atualizado com sucesso');
    }

    public function destroy(Client $client)
    {
        try{
            $client = $this->clientRepository->delete($client->id);
        }catch(Exception $e){
            return redirect()->route('home')->with('error');
        }

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
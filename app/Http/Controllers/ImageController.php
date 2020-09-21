<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function destroy(Images $image){

        dd($image);
        $client_id = $image->client_id;
        $image = $image->destroy($image->id);
        return redirect('client.update', $client_id);
    }
}
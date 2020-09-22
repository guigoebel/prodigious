<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function destroy($image){
        $image = Images::findorFail($image);

        if(!$image){
            return abort('404');
        }

        $client_id = $image->client_id;
        $image = $image->destroy($image->id);
        return redirect()->route('client.edit', [$client_id]);
    }
}
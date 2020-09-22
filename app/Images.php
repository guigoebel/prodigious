<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{

    protected $fillable = [
        'image', 'client_id'
    ];

    public function images(){
        return $this->belongsTo('App\Client');
    }

}
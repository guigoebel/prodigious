<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nome', 'email', 'data', 'sobre',
    ];

    protected $table = 'clients';

    public function images()
    {
        return $this->hasMany('App\Models\Images');
    }
}
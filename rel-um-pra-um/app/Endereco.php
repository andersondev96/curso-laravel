<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    function Cliente() {
        return $this->beLongsTo('App\Cliente', 'cliente_id', 'id');
    }
}

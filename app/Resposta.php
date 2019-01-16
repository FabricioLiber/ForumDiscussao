<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    //
    public function user () {
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function postagem () {
        return $this->belongsTo('App\Postagem', 'id_postagem');
    }
}

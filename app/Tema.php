<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    //
    public function postagens () {
        return $this->hasMany('App\Postagem', 'id_tema');
    }

    public function user () {
        return $this->belongsTo('App\User', 'id_usuario');
    }
}

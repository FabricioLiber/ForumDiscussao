<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    //
    protected $table='postagens';

    public function user () {
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function tema () {
        return $this->belongsTo('App\Tema', 'id_tema');
    }

    public function respostas () {
        return $this->hasMany('App\Resposta', 'id_postagem');
    }
}

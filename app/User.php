<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function postagens () {
        return $this->hasMany('App\Postagem', 'id_usuario');
    }

    public function respostas () {
        return $this->hasMany('App\Resposta', 'id_usuario');
    }

    public function temas () {
        return $this->hasMany('App\Tema', 'id_usuario');
    }
}

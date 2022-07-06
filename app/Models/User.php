<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'users';

    protected $guarded = [];
    public function caixaEntrada(){
        return $this->belongsTo(Post::class, 'id_solicitante', 'id');
    }
    public function acesso(){
        return $this->hasOne(Acesso::class, 'id', 'id_acesso'); 
    }
    public function chat(){
        return $this->hasOne(Chat::class, 'id', 'user_1', Chat::class, 'id', 'user_2'); 
    }
    public function mensagem(){
        return $this->hasOne(ChatMensagem::class, 'id', 'id_remetente'); 
    }
}
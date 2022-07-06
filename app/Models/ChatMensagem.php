<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMensagem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'chat_mensagem';

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class, 'id_remetente', 'id'); 
    }
}
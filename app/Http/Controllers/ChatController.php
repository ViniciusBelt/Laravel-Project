<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMensagem;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function chat()
    {
        if(Auth::user()->id_acesso === 1){
            $usuarios = User::select('nome', 'id')->get();
            $chat = Chat::where('user_1', Auth::user()->id)->orWhere('user_2', Auth::user()->id)->get();
            $mensagem = ChatMensagem::get();
            return view('admin.posts.chat', compact('usuarios', 'chat', 'mensagem'));
        }else{
            return redirect(route('index'))->with('alert', 'Você não tem acesso a esta página!')->with('icon', 'error');
        }
    }
}
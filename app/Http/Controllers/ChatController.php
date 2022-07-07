<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMensagem;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat()
    {
        try {
            $usuarios = User::select('nome', 'id', 'id_acesso')->where('id', '<>', Auth::user()->id)->get();
            $chat = Chat::where('user_1', Auth::user()->id)->orWhere('user_2', Auth::user()->id)->get();
            $mensagem = ChatMensagem::get();
            $chatAtual = null;
            return view('admin.posts.chat', compact('usuarios', 'chat', 'mensagem', 'chatAtual'));
        } catch (\Throwable $th) {
            return redirect(route('index'))->with('alert', 'Ocorreu um erro ao acessar esta página!')->with('icon', 'error');
        }
    }

    public function setChat(Request $request){
        try {
            $usuarios = User::select('nome', 'id', 'id_acesso')->where('id', '<>', Auth::user()->id)->get();
            $userChat = User::select('nome', 'id', 'id_acesso')->where('id', $request->userId)->first();
            $chatAtual = Chat::where(function ($q) {
                $q->where('user_1', Auth::user()->id)->orWhere('user_2', Auth::user()->id);
            })->where(function ($q) use ($request) {
                $q->where('user_1', $request->userId)->orWhere('user_2', $request->userId);
            })->first();
            if(!$chatAtual){
                $createChat = new Chat;
                $createChat->user_1       =  Auth::user()->id;
                $createChat->user_2       =  $request->userId;
                $createChat->data_criacao =  NOW();
                $createChat->save();
                return redirect(route('chat'))->with('alert', 'Novo chat criado!')->with('icon', 'success');
            }else{
                $mensagem = ChatMensagem::where('id_chat', $chatAtual->id)->get();
                $lastMsg = ChatMensagem::where('id_chat', $chatAtual->id)->orderBy('id', 'DESC')->limit(1)->first();
                return view('admin.posts.chat', compact('chatAtual', 'usuarios', 'mensagem', 'userChat', 'lastMsg'));
            }
        } catch (\Throwable $th) {
            return redirect(route('index'))->with('alert', 'Erro ao abrir o chat, verifique sua conexão')->with('icon', 'error');
        }
    }

    public function enviaMsg(Request $request){
        try {
            date_default_timezone_set('America/Sao_Paulo');
            $msg = new ChatMensagem();
            $msg->id_chat      = $request->chatAtual;
            $msg->id_remetente = Auth::user()->id;
            $msg->mensagem     = $request->mensagem;
            $msg->data_criacao = NOW();
            $msg->save();
            return back();
        } catch (\Throwable $th) {
            return redirect(route('index'))->with('alert', 'Erro ao enviar mensagem, verifique sua conexão')->with('icon', 'error');
        }
    }
}
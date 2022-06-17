<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class Authenticate extends Controller
{
    public function criarUsuario(Request $request){
        $event = new User;
        $event->usuario      = $request->user;
        $event->nome        = $request->name;
        $event->email        = $request->mail;
        $event->senha        = md5($request->password);
        $event->data_criacao = $request->data_criacao;
        $event->save();
        return view('login')->with('alert', 'Usuario cadastrado com sucesso');
    }

    public function login(Request $request){
        try {
            $user = User::where('usuario', $request->user)
                      ->where('senha',md5($request->password))
                      ->first();
            Auth::login($user);
            return redirect(route('index'))->with('alert', 'Usuario logado com sucesso');
        } catch (\Throwable $th) {
            return redirect(route('index'))->with('alert', 'Usuario não cadastrado');;
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
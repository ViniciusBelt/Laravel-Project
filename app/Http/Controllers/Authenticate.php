<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authenticate extends Controller
{
    public function criarUsuario(Request $request){
        $selectUser = User::where('usuario', $request->user)->first();
        if($selectUser == null){
            try {
                $event = new User;
                $event->usuario      = $request->user;
                $event->nome         = $request->name;
                $event->email        = $request->mail;
                $event->id_acesso    = 3;
                $event->senha        = Hash::make($request->password);
                $event->data_criacao = $request->data_criacao;
                $event->save();
                return redirect('/login')->with('alert', 'Usuario cadastrado com sucesso')->with('icon', 'success');
            } catch (\Throwable $th) {
                return redirect(route('registrar'))->with('alert', 'Falha ao registrar-se')->with('icon', 'error');
            }
        }else{
            return redirect(route('registrar'))->with('alert', 'Usuario já cadastrado')->with('icon', 'error');
        }
    }

    public function login(Request $request){
        try {
            $user = User::where('usuario', $request->user)
                        ->first();
            if($user && Hash::check($request->password, $user->senha) && $user->id_acesso != 4){
                Auth::login($user);
                return redirect(route('index'))->with('alert', 'Usuario logado com sucesso')->with('icon', 'success');
            }
            return redirect(route('pgLogin'))->with('alert', 'Usuario ou senha incorretos')->with('icon', 'error');
        } catch (\Throwable $th) {
            return redirect(route('pgLogin'))->with('alert', 'Erro ao fazer login')->with('icon', 'error');
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
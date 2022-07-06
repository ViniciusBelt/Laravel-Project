<?php

namespace App\Http\Controllers;

use App\Models\Acesso;
use Illuminate\Support\Facades\Auth;
use App\Models\Etapas;
use App\Models\Objetivo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat()
    {
        if(Auth::user()->id_acesso === 1){
            return view('admin.posts.chat');
        }else{
            return redirect(route('index'))->with('alert', 'Você não tem acesso a esta página!')->with('icon', 'error');
        }
    }
}
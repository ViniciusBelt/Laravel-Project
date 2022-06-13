<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function criarUsuario(Request $request){
        return redirect('login');
        //return redirect('/');
    }
}
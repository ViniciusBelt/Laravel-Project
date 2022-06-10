<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function update(Request $request){
        User::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Etapa Editada com Sucesso!');
    }
}
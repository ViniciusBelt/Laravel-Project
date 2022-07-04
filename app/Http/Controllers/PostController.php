<?php

namespace App\Http\Controllers;

use App\Models\Acesso;
use Illuminate\Support\Facades\Auth;
use App\Models\Etapas;
use App\Models\Objetivo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        if(Auth::user()){

            $date = date('Y-m-d');
            
            $posts = Post::with('etapa')->get()->sortByDesc('id');
            $countEntrada = $posts->count();
            
            
            $andamento = Post::with('etapa')->where('id_etapa', '=', '1')
                                            ->orWhere('id_etapa', '=', '2')
                                            ->orderBy('caixaEntrada.id', 'DESC')
                                            ->get();
            $countAndamento = $andamento->count();
            
            
            $minha = Post::with('etapa')->where('id_solicitante', '=', Auth::user()->id)
                                        ->orderBy('caixaEntrada.id', 'DESC')
                                        ->get();
            $countMinha = $minha->count();
            
            $aVencer = Post::with('etapa')->where('data_aprovacao', '<=', $date)
                                          ->where(function ($query){
                                                $query->where('id_etapa', '=', '1')
                                                    ->orWhere('id_etapa', '=', '2');
                                            })
                                          ->orderBy('caixaEntrada.id', 'DESC')
                                          ->get();
            $countAVencer = $aVencer->count();
            
            $doDia = Post::with('etapa')->where('data_solicitacao', '=', "$date")
                                        ->orderBy('caixaEntrada.id', 'DESC')
                                        ->get();
            $countDoDia = $doDia->count();
            
            if($countEntrada != 0){
                $porEntrada = (100 * $countEntrada) / $countEntrada;
                $porAndamento = (100 * $countAndamento) / $countEntrada;
                $porMinha = (100 * $countMinha) / $countEntrada;
                $porVencer = (100 * $countAVencer) / $countEntrada;
                $porDia = (100 * $countDoDia) / $countEntrada;
                
                return view('admin.posts.index', compact('posts',
                'andamento',
                'minha',
                'aVencer',
                'doDia',
                'countEntrada',
                'countAndamento',
                'countMinha',
                'countAVencer',
                'date',
                'countDoDia',
                'porEntrada',
                'porAndamento',
                'porMinha',
                'porVencer',
                'porDia',
            ));
            }else{
                $porEntrada = 0;
                $porAndamento = 0;
                $porMinha = 0;
                $porVencer = 0;
                $porDia = 0;
                return view('admin.posts.index', compact('posts',
                'andamento',
                'minha',
                'aVencer',
                'doDia',
                'countEntrada',
                'countAndamento',
                'countMinha',
                'countAVencer',
                'date',
                'countDoDia',
                'porEntrada',
                'porAndamento',
                'porMinha',
                'porVencer',
                'porDia',
                ))->with('alert', 'Usuario logado com sucesso');
            }
        }else{
            return view('login')->with('alert', 'Usuario não cadastrado');
        }
    }

    public function salvar(Request $request)
    {
        if(Auth::user()){
            $event = new Post;
            
            $event->tipo_solicitacao = $request->tipo_solicitacao;
            $event->cliente          = $request->cliente;
            $event->id_solicitante   = Auth::user()->id;
            $event->cpf_cnpj_id      = $request->cpf_cnpj_id;
            $event->data_aprovacao   = $request->data_aprovacao;        
            $event->id_etapa         = $request->id_etapa;
            $event->data_solicitacao = $request->data_solicitacao;
    
            $event->save();
            return redirect()->back()->with('msg', 'Solicitação Cadastrada com Sucesso!');
        }else{
            return redirect('login');
        }
    }

    public function destroy($id)
    {
        if(Auth::user()){
            Post::findOrFail($id)->delete();
            return redirect()->back()->with('msg', 'Solicitação Excluida com Sucesso!');
        }else{
            return redirect('login');
        }
    }

    public function edit($id)
    {
        if(Auth::user()){
            $event = Post::findOrFail($id);
            $etapas = Etapas::all();
    
            return view('admin.posts.edit', ['event' => $event], compact('etapas'));
        }else{
            return redirect('login');
        }
    }

    public function update(Request $request)
    {
        if(Auth::user()){
            Post::findOrFail($request->id)->update($request->all());
    
            return redirect()->back()->with('msg', 'Etapa Editada com Sucesso!');
        }else{
            return redirect('login');
        }
    }

    public function solicitacoes()
    {
        if(Auth::user()){
            $solicitacoes = Post::with('etapa')->where('id_etapa', '=', 1)->orWhere('id_etapa', '=', 2)->get()->sortByDesc('id');
            $solicitacoesConcluidas = Post::with('etapa')->where('id_etapa', '=', 3)
                                                         ->orWhere('id_etapa', '=', 4)
                                                         ->orWhere('id_etapa', '=', 5)->get()->sortByDesc('id');
            return view('admin.posts.solicitacoes', compact('solicitacoes', 'solicitacoesConcluidas'));
        }else{
            return redirect('login');
        }
    }

    public function acessos()
    {
        if(Auth::user() && Auth::user()->id_acesso === 1){
            $usuarios = User::get()->sortByDesc('id');
            return view('admin.posts.acessos', compact('usuarios'));
        }else{
            return redirect('login');
        }
    }

    public function destroyUser($id)
    {
        if(Auth::user() && Auth::user()->id_acesso === 1){
            Post::where('id_solicitante', '=', $id)->delete();
            User::findOrFail($id)->delete();
            return redirect()->back()->with('msg', 'Usuario Excluido com Sucesso!');
        }else{
            return redirect('login');
        }
    }

    public function editUser($id)
    {
        if(Auth::user() && Auth::user()->id_acesso === 1){
            $event = User::findOrFail($id);
            $acesso = Acesso::all();
    
            return view('admin.posts.editUser', ['event' => $event], compact('acesso'));
        }else{
            return redirect('login');
        }
    }

    public function updateUser(Request $request)
    {
        if(Auth::user() && Auth::user()->id_acesso === 1){
            User::findOrFail($request->id)->update($request->all());
    
            return redirect(url('/acessos'))->with('alert', 'Usuario Editado com Sucesso!');
        }else{
            return redirect('login');
        }
    }

    public function objetivo(){
        $objetivo = Objetivo::get()->first();
        return view('admin.posts.objetivo', compact('objetivo'));
    }

    public function editObjetivo()
    {
        if(Auth::user() && Auth::user()->id_acesso === 1){
            $objetivo = Objetivo::get()->first();
    
            return view('admin.posts.editObjetivo', compact('objetivo'));
        }else{
            return redirect('login');
        }
    }

    public function updateObjetivo(Request $request)
    {
        if(Auth::user() && Auth::user()->id_acesso === 1){
            Objetivo::findOrFail($request->id)->update($request->all());
    
            return redirect(url('/objetivo'))->with('alert', 'Objetivo Editado com Sucesso!');
        }else{
            return redirect('login');
        }
    }
}
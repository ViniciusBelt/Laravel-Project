<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Etapas;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        if(Auth::user()){

            $date = date('Y-m-d');
            
            $posts = Post::with('etapa')->get()->sortByDesc('id');
            $countEntrada = $posts->count();
            
            
            $andamento = Post::with('etapa')->where('id_etapa', '=', '1')
            ->orWhere('id_etapa', '=', '2')
            ->orderBy('id', 'DESC')
            ->get();
            $countAndamento = $andamento->count();
            
            
            $minha = Post::with('etapa')->where('solicitante', '=', Auth::user()->usuario)
            ->orderBy('id', 'DESC')
            ->get();
            $countMinha = $minha->count();
            
            
            $aVencer = Post::with('etapa')->where('data_aprovacao', '<=', "$date")->where('id_etapa', '=', '1')->orWhere('id_etapa', '=', '2')
            ->orderBy('id', 'DESC')
            ->get();
            $countAVencer = $aVencer->count();
            
            $doDia = Post::with('etapa')->where('data_solicitacao', '=', "$date")
            ->orderBy('id', 'DESC')
            ->get();
            $countDoDia = $doDia->count();
            
            if($countEntrada != 0){
                $countTotal = 100 / ($countEntrada + $countAndamento + $countMinha + $countAVencer + $countDoDia);
                $porEntrada = $countEntrada * $countTotal;
                $porAndamento = $countAndamento * $countTotal;
                $porMinha = $countMinha * $countTotal;
                $porVencer = $countAVencer * $countTotal;
                $porDia = $countDoDia * $countTotal;
                
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
                ));
            }
        }else{
            return redirect('login');
        }
    }

    public function salvar(Request $request){
        if(Auth::user()){
            $event = new Post;
            
            $event->tipo_solicitacao = $request->tipo_solicitacao;
            $event->cliente          = $request->cliente;
            $event->solicitante      = Auth::user()->usuario;
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

    public function destroy($id){
        if(Auth::user()){
            Post::findOrFail($id)->delete();
            return redirect()->back()->with('msg', 'Solicitação Excluida com Sucesso!');
        }else{
            return redirect('login');
        }
    }

    public function edit($id){
        if(Auth::user()){
            $event = Post::findOrFail($id);
            $etapas = Etapas::all();
    
            return view('admin.posts.edit', ['event' => $event], compact('etapas'));
        }else{
            return redirect('login');
        }
    }

    public function update(Request $request){
        if(Auth::user()){
            Post::findOrFail($request->id)->update($request->all());
    
            return redirect()->back()->with('msg', 'Etapa Editada com Sucesso!');
        }else{
            return redirect('login');
        }
    }
    public function solicitacoes(){
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
}
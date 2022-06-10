<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        if(Auth::user()){

            $date = date('Y-m-d');

            $posts = Post::all()->sortByDesc('id');
            $countEntrada = Post::count();


            $andamento = Post::where('etapa', 'LIKE', "%Em Andamento%")
            ->orderBy('id', 'DESC')
            ->get();
            $countAndamento = $andamento->count();


            $minha = Post::where('solicitante', 'LIKE', "%Beltran%")
            ->orderBy('id', 'DESC')
            ->get();
            $countMinha = $minha->count();


            $aVencer = Post::where('data_aprovacao', '<=', "$date")
            ->orderBy('id', 'DESC')
            ->get();
            $countAVencer = $aVencer->count();

            $doDia = Post::where('data_solicitacao', '=', "$date")
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
        $event = new Post;

        $event->tipo_solicitacao = $request->tipo_solicitacao;
        $event->cliente          = $request->cliente;
        $event->solicitante      = $request->solicitante;
        $event->cpf_cnpj_id      = $request->cpf_cnpj_id;
        $event->data_aprovacao    = $request->data_aprovacao;        
        $event->etapa            = $request->etapa;
        $event->data_solicitacao = $request->data_solicitacao;

        $event->save();
        return redirect('/')->with('msg', 'Solicitação Cadastrada com Sucesso!');;
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Solicitação Excluida com Sucesso!');
    }

    public function edit($id){

        $event = Post::findOrFail($id);

        return view('admin.posts.edit', ['event' => $event]);
    }

    public function update(Request $request){
        Post::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Etapa Editada com Sucesso!');
    }
}
@include('layouts.app')
<div class="container" style="text-align: center">
    @if(Auth::user()->id_acesso === 1)
    <a href="{{ url('/editObjetivo') }}" class="btn btn-info edit-btn" style="float: right">Editar</a>
    @endif
    @if($objetivo == null)
    <h4>Objetivo</h4>
    @else
    <h4>{{$objetivo->titulo}}</h4>
    @endif
    <div style="text-align: center; margin:20px; border: 2px solid rgb(217, 217, 217); border-radius:20px">
        @if($objetivo == null)
        <p>
            Treinar diferentes casos de CRUD (Create - Read - Update - Delete), através da possibilidade de criar solicitações, alterar acessos de usuarios, 
            entre outras funções disponiveis, além de conhecer mais sobre o framework Laravel e outras ferramentas utilizadas no projeto.
        </p>
        @else
        <p>{{$objetivo->descricao}}</p>
        @endif
    </div>
</div>
    @include('layouts.final')
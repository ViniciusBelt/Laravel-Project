@include('layouts.app')

<div class="row">
    <div class="col-md">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3 id="contEntrada">0</h3>
                <p>Caixa de Entrada</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#caixaEntrada">Info
                    <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3 id="countAndamento">0</h3>

                <p>Em Andamento</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#emAndamento">Info
                <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3 id="countMinha">0</h3>

                <p>Minhas Solicitações</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#minhasSolicitacoes">Info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3 id="countAVencer">0</h3>
                <p>A Vencer</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#aVencer">Info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3 id="countDoDia">0</h3>

                <p>Solicitações do Dia</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#doDia">Info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<button class="btn btn-primary" data-toggle="modal" data-target="#novaSolicitacao">Nova Solicitação</button>
<!-- Solicitação por Etapa -->
<div class="card col align-self-center" style="text-align: center; margin-top: 1rem">
    <div class="card-header">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <h4>Solicitação por Etapa</h4>
        </button>
    </div>
    <div class="card-body">
        <h5><a href="#" data-toggle="modal" data-target="#caixaEntrada">Caixa de Entrada</a></h5>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100" style="width: 0%; height:25px" id="graficoEntrada">
                <h6>Caixa de Entrada</h6>
            </div>
        </div><br>
        <h5><a href="#" data-toggle="modal" data-target="#emAndamento">Em Andamento</a></h5>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="45"
                aria-valuemin="0" aria-valuemax="100" style="width: 0%; height:25px" id="graficoAndamento">
                <h6>Em Andamento</h6>
            </div>
        </div><br>
        <h5><a href="#" data-toggle="modal" data-target="#minhasSolicitacoes">Minhas Solicitações</a></h5>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="65"
                aria-valuemin="0" aria-valuemax="100" style="width: 0%; height:25px" id="graficoMinha">
                <h6>Minhas Solicitações</h6>
            </div>
        </div><br>
        <h5><a href="#" data-toggle="modal" data-target="#aVencer">A Vencer</a></h5>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="85"
                aria-valuemin="0" aria-valuemax="100" style="width: 0%; height:25px" id="graficoVencer">
                <h6>A Vencer</h6>
            </div>
        </div><br>
        <h5><a href="#" data-toggle="modal" data-target="#doDia">Solicitação do Dia</a></h5>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100"
                aria-valuemin="0" aria-valuemax="100" style="width: 0%; height:25px" id="graficoDia">
                <h6>Solicitação do Dia</h6>
            </div>
        </div><br>
    </div>
    <!-- /.card-body -->
</div>
<!-- Minhas Ultimas Solicitações -->
<div class="card col align-self-center" style="text-align: center; margin-top: 1rem">
    <div class="card-header">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <h4>Minhas Ultimas Solicitações</h4>
        </button>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover" style="text-align: center">
            <thead class="tbl-cabecalho">
                <tr>
                    <th scope="col"><strong>CPF/CNPJ/ID</strong></th>
                    <th scope="col"><strong>Cliente</strong></th>
                    <th scope="col"><strong>Solicitante</strong></th>
                    <th scope="col"><strong>Etapa</strong></th>
                    <th scope="col"><strong>Data Solicitação</strong></th>
                    <th scope="col"><strong>Data Vencimento</strong></th>
                    <th scope="col"><strong>Tipo Solicitação</strong></th>
                </tr>
            </thead>
            @foreach ($minha as $post)
            <tbody>
                <td>{{ $post -> cpf_cnpj_id }}</td>
                <td>{{ $post -> cliente }}</td>
                <td>{{ $post -> users -> nome }}</td>
                <td>{{ $post -> etapa -> descricao }}</td>
                <td>{{ date('d/m/Y', strtotime($post -> data_solicitacao)) }}</td>
                <td>{{ date('d/m/Y', strtotime($post -> data_aprovacao)) }}</td>
                <td>{{ $post -> tipo_solicitacao }}</td>
            </tbody>
            @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- Modal Caixa de Entrada -->
<div class="modal fade" id="caixaEntrada" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <h4>Caixa de Entrada</h4>
                <div class="col table-responsive">
                    <table class="table table-sm">
                        <thead class="tbl-cabecalho">
                            <tr>
                                <th scope="col"><strong>CPF/CNPJ/ID</strong></th>
                                <th scope="col"><strong>Cliente</strong></th>
                                <th scope="col"><strong>Solicitante</strong></th>
                                <th scope="col"><strong>Etapa</strong></th>
                                <th scope="col"><strong>Data Solicitação</strong></th>
                                <th scope="col"><strong>Data Vencimento</strong></th>
                                <th scope="col"><strong>Tipo Solicitação</strong></th>
                                <th scope="col"><strong>#</strong></th>
                                <th scope="col"><strong>#</strong></th>
                            </tr>
                        </thead>
                        @foreach ($posts as $post)
                        <tbody>
                            <td>{{ $post -> cpf_cnpj_id }}</td>
                            <td>{{ $post -> cliente }}</td>
                            <td>{{ $post -> users -> nome }}</td>
                            <td>{{ $post -> etapa -> descricao }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_solicitacao)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_aprovacao)) }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                            @if(Auth::user()->id_acesso === 1 || Auth::user()->id === $post -> users -> id)
                            <td><a href="edit/{{ $post->id }}" class="btn btn-info edit-btn">Editar</a></td>
                            <td>
                                <form action="/{{ $post->id }}" method="POST" id="formDelete">
                                    @csrf
                                    @method('DELETE')
                                    <input type="button" class="btn btn-danger delete-btn" id="btnDeletar" value="Deletar" onclick="deleteForm()">
                                </form>
                            </td>
                            @endif
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Em Andamento -->
<div class="modal fade" id="emAndamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <h4>Em Andamento</h4>
                <div class="col table-responsive" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <thead class="tbl-cabecalho">
                            <tr>
                                <th scope="col"><strong>CPF/CNPJ/ID</strong></th>
                                <th scope="col"><strong>Cliente</strong></th>
                                <th scope="col"><strong>Solicitante</strong></th>
                                <th scope="col"><strong>Etapa</strong></th>
                                <th scope="col"><strong>Data Solicitação</strong></th>
                                <th scope="col"><strong>Data Vencimento</strong></th>
                                <th scope="col"><strong>Tipo Solicitação</strong></th>
                            </tr>
                        </thead>
                        @foreach ($andamento as $post)
                        <tbody>
                            <td>{{ $post -> cpf_cnpj_id }}</td>
                            <td>{{ $post -> cliente }}</td>
                            <td>{{ $post -> users -> nome }}</td>
                            <td>{{ $post -> etapa -> descricao }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_solicitacao)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_aprovacao)) }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Minhas Solicitações -->
<div class="modal fade" id="minhasSolicitacoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <h4>Minhas Solicitações</h4>
                <div class="col table-responsive" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <thead class="tbl-cabecalho">
                            <tr>
                                <th scope="col"><strong>CPF/CNPJ/ID</strong></th>
                                <th scope="col"><strong>Cliente</strong></th>
                                <th scope="col"><strong>Solicitante</strong></th>
                                <th scope="col"><strong>Etapa</strong></th>
                                <th scope="col"><strong>Data Solicitação</strong></th>
                                <th scope="col"><strong>Data Vencimento</strong></th>
                                <th scope="col"><strong>Tipo Solicitação</strong></th>
                            </tr>
                        </thead>
                        @foreach ($minha as $post)
                        <tbody>
                            <td>{{ $post -> cpf_cnpj_id }}</td>
                            <td>{{ $post -> cliente }}</td>
                            <td>{{ $post -> users -> nome }}</td>
                            <td>{{ $post -> etapa -> descricao }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_solicitacao)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_aprovacao)) }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal A Vencer Hoje -->
<div class="modal fade" id="aVencer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <h4>A Vencer</h4>
                <div class="col table-responsive" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <thead class="tbl-cabecalho">
                            <tr>
                                <th scope="col"><strong>CPF/CNPJ/ID</strong></th>
                                <th scope="col"><strong>Cliente</strong></th>
                                <th scope="col"><strong>Solicitante</strong></th>
                                <th scope="col"><strong>Etapa</strong></th>
                                <th scope="col"><strong>Data Solicitação</strong></th>
                                <th scope="col"><strong>Data Vencimento</strong></th>
                                <th scope="col"><strong>Tipo Solicitação</strong></th>
                            </tr>
                        </thead>
                        @foreach ($aVencer as $post)
                        <tbody>
                            <td>{{ $post -> cpf_cnpj_id }}</td>
                            <td>{{ $post -> cliente }}</td>
                            <td>{{ $post -> users -> nome }}</td>
                            <td>{{ $post -> etapa -> descricao }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_solicitacao)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_aprovacao)) }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Do Dia -->
<div class="modal fade" id="doDia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <h4>Solicitações do Dia</h4>
                <div class="col table-responsive" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <thead class="tbl-cabecalho">
                            <tr>
                                <th scope="col"><strong>CPF/CNPJ/ID</strong></th>
                                <th scope="col"><strong>Cliente</strong></th>
                                <th scope="col"><strong>Solicitante</strong></th>
                                <th scope="col"><strong>Etapa</strong></th>
                                <th scope="col"><strong>Data Solicitação</strong></th>
                                <th scope="col"><strong>Data Vencimento</strong></th>
                                <th scope="col"><strong>Tipo Solicitação</strong></th>
                            </tr>
                        </thead>
                        @foreach ($doDia as $post)
                        <tbody>
                            <td>{{ $post -> cpf_cnpj_id }}</td>
                            <td>{{ $post -> cliente }}</td>
                            <td>{{ $post -> users -> nome }}</td>
                            <td>{{ $post -> etapa -> descricao }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_solicitacao)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($post -> data_aprovacao)) }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@include('layouts.final')
<style>
    table { 
        overflow:auto; 
    }
</style>
<script>
    //Laço countEntrada
    var numEntrada = document.getElementById('contEntrada');
    var minEntrada = 0;
    var maxEntrada = {{$countEntrada}};
    var duracao = 1000;
    var duracaoGrafico = 1000;
    for (var i = minEntrada; i <= maxEntrada; i++) {
        setTimeout((nr) => {
            numEntrada.innerHTML = nr;
        }, i * duracao / maxEntrada, i);
    };
    //Grafico
    var graficoEntrada = document.getElementById('graficoEntrada');
    var maxGraficoEntrada = {{$porEntrada}};
    for (var i = minEntrada; i <= maxGraficoEntrada; i++) {
        setTimeout((nr) => {
            graficoEntrada.style.width = nr+'%';
        }, i * duracaoGrafico / maxGraficoEntrada, i);
    };

    //Laço countAndamento
    var numAndamento = document.getElementById('countAndamento');
    var minAndamento = 0;
    var maxAndamento = {{$countAndamento}};
    for (var i = minAndamento; i <= maxAndamento; i++) {
        setTimeout((nr) => {
            numAndamento.innerHTML = nr;
        }, i * duracao / maxAndamento, i);
    };
    //Grafico
    var graficoAndamento = document.getElementById('graficoAndamento');
    var maxgraficoAndamento = {{$porAndamento}};
    for (var i = minEntrada; i <= maxgraficoAndamento; i++) {
        setTimeout((nr) => {
            graficoAndamento.style.width = nr+'%';
        }, i * duracaoGrafico / maxgraficoAndamento, i);
    };

    //Laço countMinha
    var numMinha = document.getElementById('countMinha');
    var minMinha = 0;
    var maxMinha = {{$countMinha}};
    for (var i = minMinha; i <= maxMinha; i++) {
        setTimeout((nr) => {
            numMinha.innerHTML = nr;
        }, i * duracao / maxMinha, i);
    };
    //Grafico
    var graficoMinha = document.getElementById('graficoMinha');
    var maxgraficoMinha = {{$porMinha}};
    for (var i = minEntrada; i <= maxgraficoMinha; i++) {
        setTimeout((nr) => {
            graficoMinha.style.width = nr+'%';
        }, i * duracaoGrafico / maxgraficoMinha, i);
    };

    //Laço countVencer
    var numVencer = document.getElementById('countAVencer');
    var minVencer = 0;
    var maxVencer = {{$countAVencer}};
    for (var i = minVencer; i <= maxVencer; i++) {
        setTimeout((nr) => {
            numVencer.innerHTML = nr;
        }, i * duracao / maxVencer, i);
    };
    //Grafico
    var graficoVencer = document.getElementById('graficoVencer');
    var maxgraficoVencer = {{$porVencer}};
    for (var i = minEntrada; i <= maxgraficoVencer; i++) {
        setTimeout((nr) => {
            graficoVencer.style.width = nr+'%';
        }, i * duracaoGrafico / maxgraficoVencer, i);
    };

    //Laço countDia
    var numDia = document.getElementById('countDoDia');
    var minDia = 0;
    var maxDia = {{$countDoDia}};
    for (var i = minDia; i <= maxDia; i++) {
        setTimeout((nr) => {
            numDia.innerHTML = nr;
        }, i * duracao / maxDia, i);
    };
    //Grafico
    var graficoDia = document.getElementById('graficoDia');
    var maxgraficoDia = {{$porDia}};
    for (var i = minEntrada; i <= maxgraficoDia; i++) {
        setTimeout((nr) => {
            graficoDia.style.width = nr+'%';
        }, i * duracaoGrafico / maxgraficoDia, i);
    };

    function deleteForm(){
        Swal.fire({
            title: 'Atenção',
            text: 'Deseja mesmo excluir esta solicitação?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'A solcitação foi excluida!',
                'A solicitação foi excluida com sucesso.',
                'success'
                )
                $('#formDelete').submit()
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                'Cancelado',
                'A solicitação não foi excluida.',
                'error'
                )
            }
        })
    }
</script>
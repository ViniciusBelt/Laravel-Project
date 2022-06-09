@include('layouts.app')

<div class="row">
    <div class="col-md">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>{{ $countEntrada }}</h3>
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
                <h3>{{ $countAndamento }}</h3>

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
                <h3>{{ $countMinha }}</h3>

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
                <h3>{{ $countAVencer }}</h3>
                <p>A Vencer Hoje</p>
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
                <h3>{{ $countDoDia }}</h3>

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
<div class="col align-self-center" style="text-align: center">
    <h4>Solicitação por etapa</h4>
    <h5><a href="#" data-toggle="modal" data-target="#caixaEntrada">Caixa de Entrada</a></h5>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25"
            aria-valuemin="0" aria-valuemax="100" style="width: {{ $porEntrada }}%; height:25px">
            <h6>Caixa de Entrada</h6>
        </div>
    </div><br>
    <h5><a href="#" data-toggle="modal" data-target="#emAndamento">Em Andamento</a></h5>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="45"
            aria-valuemin="0" aria-valuemax="100" style="width: {{ $porAndamento }}%; height:25px">
            <h6>Em Andamento</h6>
        </div>
    </div><br>
    <h5><a href="#" data-toggle="modal" data-target="#minhasSolicitacoes">Minhas Solicitações</a></h5>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="65"
            aria-valuemin="0" aria-valuemax="100" style="width: {{ $porMinha }}%; height:25px">
            <h6>Minhas Solicitações</h6>
        </div>
    </div><br>
    <h5><a href="#" data-toggle="modal" data-target="#aVencer">A Vencer Hoje</a></h5>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="85"
            aria-valuemin="0" aria-valuemax="100" style="width: {{ $porVencer }}%; height:25px">
            <h6>A Vencer Hoje</h6>
        </div>
    </div><br>
    <h5><a href="#" data-toggle="modal" data-target="#doDia">Solicitação do Dia</a></h5>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100"
            aria-valuemin="0" aria-valuemax="100" style="width: {{ $porDia }}%; height:25px">
            <h6>Solicitação do Dia</h6>
        </div>
    </div><br>
</div>

<!-- Minhas Ultimas Solicitações -->
<div class="col align-self-center" style="text-align: center">
    <table class="table table-striped table-hover" style="text-align: center">
        <h4>Minhas Ultimas Solicitações</h4>
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
            <td>{{ $post -> solicitante }}</td>
            <td>{{ $post -> etapa }}</td>
            <td>{{ $post -> data_solicitacao }}</td>
            <td>{{ $post -> data_aprovacao }}</td>
            <td>{{ $post -> tipo_solicitacao }}</td>
        </tbody>
        @endforeach
    </table>
</div>

<!-- Modal nova Solicitação -->
<div class="modal fade" id="novaSolicitacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col" style="text-align: center">
                    <h4>Nova Solicitação</h4>
                    <form action="/" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title" style="float: left;">Tipo de Solicitação</label>
                            <input type="text" class="form-control" id="tipo_solicitacao" name="tipo_solicitacao" placeholder="Tipo de Solicitação" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="title" style="float: left;">Cliente</label>
                            <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="title" style="float: left;">Solicitante</label>
                            <input type="text" class="form-control" id="solicitante" name="solicitante" placeholder="Solicitante" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="title" style="float: left;">CPF/CNPJ/ID</label>
                            <input type="text" class="form-control" id="cpf_cnpj_id" name="cpf_cnpj_id" placeholder="CPF/CNPJ/ID" maxlength="14">
                        </div>
                        <div class="form-group">
                            <label for="title" style="float: left;">Data de Vencimento</label>
                            <input type="date" class="form-control" id="data_aprovacao" name="data_aprovacao" placeholder="Data de Vencimento">
                        </div>
                        <?php
                            $data = date('Y-m-d'); 
                        ?>
                        <input type="hidden" name="etapa" value="Em Andamento" id="etapa" name="etapa">
                        <input type="hidden" name="data_solicitacao" value="<?php echo $data ?>" id="data_solicitacao" name="data_solicitacao">
                        <input type="submit" class="btn btn-primary" value="Salvar Solicitação">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
            <div class="modal-body">
                <div class="col" style="text-align: center">
                    <table class="table table-sm">
                        <h4>Caixa de Entrada</h4>
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
                            <td>{{ $post -> solicitante }}</td>
                            <td>{{ $post -> etapa }}</td>
                            <td>{{ $post -> data_solicitacao }}</td>
                            <td>{{ $post -> data_aprovacao }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                            <td><a href="edit/{{ $post->id }}" class="btn btn-info edit-btn">Editar</a></td>
                            <td>
                                <form action="/{{ $post->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                                </form>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <div class="modal-body">
                <div class="col" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <h4>Em Andamento</h4>
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
                            <td>{{ $post -> solicitante }}</td>
                            <td>{{ $post -> etapa }}</td>
                            <td>{{ $post -> data_solicitacao }}</td>
                            <td>{{ $post -> data_aprovacao }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <div class="modal-body">
                <div class="col" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <h4>Minhas Solicitações</h4>
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
                            <td>{{ $post -> solicitante }}</td>
                            <td>{{ $post -> etapa }}</td>
                            <td>{{ $post -> data_solicitacao }}</td>
                            <td>{{ $post -> data_aprovacao }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <div class="modal-body">
                <div class="col" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <h4>A Vencer Hoje</h4>
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
                            <td>{{ $post -> solicitante }}</td>
                            <td>{{ $post -> etapa }}</td>
                            <td>{{ $post -> data_solicitacao }}</td>
                            <td>{{ $post -> data_aprovacao }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <div class="modal-body">
                <div class="col" style="text-align: center">
                    <table class="table table-striped table-hover">
                        <h4>Solicitações do Dia</h4>
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
                            <td>{{ $post -> solicitante }}</td>
                            <td>{{ $post -> etapa }}</td>
                            <td>{{ $post -> data_solicitacao }}</td>
                            <td>{{ $post -> data_aprovacao }}</td>
                            <td>{{ $post -> tipo_solicitacao }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
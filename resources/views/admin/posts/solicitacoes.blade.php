@include('layouts.app')
<button class="btn btn" data-toggle="modal" data-target="#novaSolicitacao" style="float: right"><i class="bi bi-plus-circle-fill"></i></button>

<!-- Solicitações finalizadas -->
<div class="card col align-self-center" style="text-align: center; margin-top: 1rem">
    <div class="card-header">
      <h4>Solicitações pendentes</h4>
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
    <div class="card-body">
        <div class="col table-responsive" style="text-align: center">
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
                @foreach ($solicitacoes as $post)
                <tbody>
                    <td>{{ $post -> cpf_cnpj_id }}</td>
                    <td>{{ $post -> cliente }}</td>
                    <td>{{ $post -> solicitante }}</td>
                    <td>{{ $post -> etapa -> descricao }}</td>
                    <td>{{ $post -> data_solicitacao }}</td>
                    <td>{{ $post -> data_aprovacao }}</td>
                    <td>{{ $post -> tipo_solicitacao }}</td>
                    <td><a href="edit/{{ $post->id }}" class="btn btn-info edit-btn">Editar</a></td>
                    <td>
                        <form action="/{{ $post->id }}" method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                            <input type="button" class="btn btn-danger delete-btn" id="btnDeletar" value="Deletar" onclick="deleteForm()">
                        </form>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<!-- Solicitações finalizadas -->
<div class="card col align-self-center" style="text-align: center; margin-top: 1rem">
    <div class="card-header">
      <h4>Solicitações concluidas</h4>
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
    <div class="card-body">
        <div class="col table-responsive" style="text-align: center">
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
                @foreach ($solicitacoesConcluidas as $post)
                <tbody>
                    <td>{{ $post -> cpf_cnpj_id }}</td>
                    <td>{{ $post -> cliente }}</td>
                    <td>{{ $post -> solicitante }}</td>
                    <td>{{ $post -> etapa -> descricao }}</td>
                    <td>{{ $post -> data_solicitacao }}</td>
                    <td>{{ $post -> data_aprovacao }}</td>
                    <td>{{ $post -> tipo_solicitacao }}</td>
                    <td><a href="edit/{{ $post->id }}" class="btn btn-info edit-btn">Editar</a></td>
                    <td>
                        <form action="/{{ $post->id }}" method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                            <input type="button" class="btn btn-danger delete-btn" id="btnDeletar" value="Deletar" onclick="deleteForm()">
                        </form>
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>

@include('layouts.final')
<script>
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
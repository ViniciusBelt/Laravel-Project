@include('layouts.app')
<button class="btn btn" data-toggle="modal" data-target="#novaSolicitacao" style="float: right"><i class="bi bi-plus-circle-fill"></i></button>

<!-- Solicitações finalizadas -->
<div class="card col align-self-center" style="text-align: center; margin-top: 1rem">
    <div class="card-header">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <h4>Usuarios cadastrados</h4>
        </button>
    </div>
    <div class="card-body">
        <div class="col table-responsive" style="text-align: center">
            <table class="table table-sm">
                <thead class="tbl-cabecalho">
                    <tr>
                        <th scope="col"><strong>Nome</strong></th>
                        <th scope="col"><strong>Usuario</strong></th>
                        <th scope="col"><strong>Email</strong></th>
                        <th scope="col"><strong>Acesso</strong></th>
                        <th scope="col"><strong>#</strong></th>
                        <th scope="col"><strong>#</strong></th>
                    </tr>
                </thead>
                @foreach ($usuarios as $user)
                <tbody>
                    <td>{{ $user -> nome }}</td>
                    <td>{{ $user -> usuario }}</td>
                    <td>{{ $user -> email }}</td>
                    <td>{{ $user -> acesso -> descricao }}</td>
                    @if(Auth::user()->id_acesso === 1)
                    <td><a href="editUser/{{ $user->id }}" class="btn btn-info edit-btn">Editar</a></td>
                    @if(Auth::user()->id != $user->id)
                    <td>
                        <form action="/excluirUser/{{ $user->id }}" method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                            <input type="button" class="btn btn-danger delete-btn" id="btnDeletar" value="Deletar" onclick="deleteForm()">
                        </form>
                    </td>
                    @endif
                    @endif
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
            text: 'Deseja mesmo excluir este usuario? Todas suas solicitações serão apagadas',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'O usuario foi excluido!',
                'O usuario foi excluido com sucesso.',
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
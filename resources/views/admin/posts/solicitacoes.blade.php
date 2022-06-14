@include('layouts.app')
<button class="btn btn" data-toggle="modal" data-target="#novaSolicitacao" style="float: right"><i class="bi bi-plus-circle-fill"></i></button>
<div class="col table-responsive" style="text-align: center">
    <h4>Solicitações Pendentes</h4>
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
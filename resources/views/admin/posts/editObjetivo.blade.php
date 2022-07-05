@include('layouts.app')
<form action="/updateObjetivo" method="post" id="formEdit">
    @csrf
    <div class="form-group">
        <label for="title" style="float: left;">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="@if($objetivo){{$objetivo->titulo}}@endif">
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="10">@if($objetivo){{$objetivo->descricao}}@endif</textarea>
    </div>
    <input type="button" class="btn btn-primary" value="Salvar Alterações" onclick="editForm()">
</form>
@include('layouts.final')
<script>
    function editForm(){
        Swal.fire({
            title: 'Atenção',
            text: 'Deseja mesmo editar o objetivo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formEdit').submit()
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                'Cancelado',
                'O objetivo não foi editado.',
                'error'
                )
            }
        })
    }
</script>
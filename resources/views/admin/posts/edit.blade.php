@include('layouts.app')
<form action="/update/{{ $event->id }}" method="post" id="formEdit">
    @csrf
    <div class="form-group">
        <label for="title" style="float: left;">Tipo de Solicitação</label>
        <input type="text" class="form-control" id="tipo_solicitacao" name="tipo_solicitacao" value="{{ $event->tipo_solicitacao }}" maxlength="50" @if($event->id_etapa == 3 || $event->id_etapa == 4 || $event->id_etapa == 5) disabled @endif>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Cliente</label>
        <input type="text" class="form-control" id="cliente" name="cliente" value="{{ $event->cliente }}" maxlength="50" @if($event->id_etapa == 3 || $event->id_etapa == 4 || $event->id_etapa == 5) disabled @endif>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Solicitante</label>
        <input type="text" class="form-control" id="solicitante" name="solicitante" value="{{ $event->solicitante }}" maxlength="50" @if($event->id_etapa == 3 || $event->id_etapa == 4 || $event->id_etapa == 5) disabled @endif>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Etapa</label><br>
        <select name="id_etapa" id="id_etapa" class="form-control">
            <option value="{{$event->id_etapa}}" selected disabled>Etapa atual: {{$event->etapa->descricao}}</option>
            @foreach($etapas as $etapa)
            <option value="{{$etapa->id}}">{{$etapa->descricao}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">CPF/CNPJ/ID</label>
        <input type="text" class="form-control" id="cpf_cnpj_id" name="cpf_cnpj_id" value="{{ $event->cpf_cnpj_id }}" maxlength="14" @if($event->id_etapa == 3 || $event->id_etapa == 4 || $event->id_etapa == 5) disabled @endif>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Data de Vencimento</label>
        <input type="date" class="form-control" id="data_aprovacao" name="data_aprovacao" value="{{ $event->data_aprovacao }}" @if($event->id_etapa == 3 || $event->id_etapa == 4 || $event->id_etapa == 5) disabled @endif>
    </div>
    <?php
        $data = date('Y-m-d'); 
    ?>
    <input type="hidden" name="data_solicitacao" value="<?php echo $data ?>" id="data_solicitacao"
        name="data_solicitacao">
    <input type="button" class="btn btn-primary" value="Salvar Solicitação" onclick="editForm()">
</form>
@include('layouts.final')
<script>
    function editForm(){
        Swal.fire({
            title: 'Atenção',
            text: 'Deseja mesmo editar esta solicitação?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'A solcitação foi editada!',
                'A solicitação foi editada com sucesso.',
                'success'
                )
                $('#formEdit').submit()
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                'Cancelado',
                'A solicitação não foi editada.',
                'error'
                )
            }
        })
    }
</script>
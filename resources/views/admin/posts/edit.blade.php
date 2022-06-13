@include('layouts.app')
<form action="/update/{{ $event->id }}" method="post">
    @csrf
    <div class="form-group">
        <label for="title" style="float: left;">Tipo de Solicitação</label>
        <input type="text" class="form-control" id="tipo_solicitacao" name="tipo_solicitacao" value="{{ $event->tipo_solicitacao }}" maxlength="50">
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Cliente</label>
        <input type="text" class="form-control" id="cliente" name="cliente" value="{{ $event->cliente }}" maxlength="50">
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Solicitante</label>
        <input type="text" class="form-control" id="solicitante" name="solicitante" value="{{ $event->solicitante }}" maxlength="50">
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Etapa</label><br>
        <select name="id_etapa" id="id_etapa" class="form-control">
            @foreach($etapas as $etapa)
            <option value="{{$etapa->id}}">{{$etapa->descricao}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">CPF/CNPJ/ID</label>
        <input type="text" class="form-control" id="cpf_cnpj_id" name="cpf_cnpj_id" value="{{ $event->cpf_cnpj_id }}" maxlength="14">
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Data de Vencimento</label>
        <input type="date" class="form-control" id="data_aprovacao" name="data_aprovacao"
        value="{{ $event->data_aprovacao }}">
    </div>
    <?php
        $data = date('Y-m-d'); 
    ?>
    <input type="hidden" name="data_solicitacao" value="<?php echo $data ?>" id="data_solicitacao"
        name="data_solicitacao">
    <input type="submit" class="btn btn-primary" value="Salvar Solicitação">
</form>
@include('layouts.final')

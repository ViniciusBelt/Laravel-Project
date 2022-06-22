@include('layouts.app')
<form action="/updateUser/{{ $event->id }}" method="post" id="formEdit">
    @csrf
    <div class="form-group">
        <label for="title" style="float: left;">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ $event->nome }}" maxlength="50" @if(Auth::user()->id_acesso != 1) disabled @endif>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $event->usuario }}" maxlength="50" @if(Auth::user()->id_acesso != 1) disabled @endif>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $event->email }}" maxlength="50" @if(Auth::user()->id_acesso != 1) disabled @endif>
    </div>
    <div class="form-group">
        <label for="title" style="float: left;">Acesso</label><br>
        <select name="id_acesso" id="id_acesso" class="form-control" @if(Auth::user()->id_acesso != 1) disabled @endif>
            <option value="{{$event->id_acesso}}" selected disabled>Acesso atual: {{$event->acesso->descricao}}</option>
            @foreach($acesso as $acesso)
            <option value="{{$acesso->id}}">{{$acesso->descricao}}</option>
            @endforeach
        </select>
    </div>
    <input type="button" class="btn btn-primary" value="Salvar Solicitação" onclick="editForm()" @if(Auth::user()->id_acesso != 1) disabled @endif>
</form>
@include('layouts.final')
<script>
    function editForm(){
        Swal.fire({
            title: 'Atenção',
            text: 'Deseja mesmo editar este usuario?',
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
                'O usuario não foi editado.',
                'error'
                )
            }
        })
    }
</script>
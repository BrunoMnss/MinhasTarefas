@section('content')
@extends('layouts.app')
<form action="{{ route('tarefa.allTaskSearch') }}" method="GET">
    <div class="row justify-content-end">
        <div class="input-group botao-busca" style="width: 45%;">
            <span class="input-group-text" id="basic-addon1"><b>Procurar</b></span>
            <input type="text" class="form-control" value="{{ $search ?? ''}}" name="search">
            <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>

<div class="row justify-content-center">
    <div class="card border-dark mb-3" style="width: 90%;">

        <div class="table">
            <table class="table table-hover">
                <thead>
                    <tr class="center texto-header">
                        <th scope="col">Dia/Hora</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Criada</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                @foreach($data as $key => $tarefas)
                <tbody>
                    <tr class="center">
                        <td><B>{{$tarefas->dia->format('d/m/y ')}} às [ {{$tarefas->horario}} ]</B></td>
                        <td>{{$tarefas->tarefa}}</td>
                        <td>{{$tarefas->created_at->format('d/m/y - H:m:s')}}</td>
                        <td>
                            <a type="button" class="btn-per btn-warning btn-sm" href="{{ route('tarefa.allTaskEdit', $tarefas->id) }}"><i class="fa-solid fa-gear"></i></a>
                            <a type="button" class="btn-per btn-danger btn-sm" href="{{ route('tarefa.allTaskDelete', $tarefas->id) }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>

                @endforeach
            </table>
        </div>
        <div class="pagination">
            
            {{ $data->links() }}
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('.checkFeito').on('click', function() {
            tarefa_id = $(this).attr('tarefa_id')
            if ($(this).is(':checked')) {
                feito = 1
            } else {
                feito = 0
            }

            $.ajax({
                url: "{{ route('tarefa.editar.feito') }}",
                data: {
                    "_token": "{{csrf_token()}}",
                    feito: feito,
                    id: tarefa_id,
                },
                method: 'put'
            }).done(response => alert(response))
        })
    </script>


    @endsection
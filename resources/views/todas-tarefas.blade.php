@section('content')
@extends('layouts.app')
<div class="row justify-content-end">
    <form action="{{ route('tarefa.allTaskSearch') }}" method="GET">
        <div class="input-group botao-busca" style="width: 45%;">
            <span class="input-group-text" id="basic-addon1"><b>Procurar</b></span>
            <input type="text" class="form-control" value="{{ $search ?? ''}}" name="search">
            <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>
<div class="row justify-content-center">
    <div class="card border-dark mb-3" style="width: 95%;">
        <div class="table">
            <table class="table table-hover">
                <thead>
                    <tr class="center texto-header">
                        <th scope="col"></th>
                        <th scope="col">Dia/Hora</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Criada</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                @foreach($data as $key => $tarefas)
                <tbody>

                    <tr class="center texto-tabela">

                        <th scope="row"></th>
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
    </div>
</div>


@endsection
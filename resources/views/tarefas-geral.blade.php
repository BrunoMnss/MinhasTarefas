@extends('layouts.app')
@section('content')

<div class="container">
    <div class="center">
        <a type="button" class="btn btn-primary btn-lg" href="{{ route('tarefa.create')}}">Adicionar Tarefa</a>
        <a type="button" class="btn btn-secondary btn-lg" href="">Editar Tarefa</a>
    </div>
</div>


<div class="container-lg">
    <div class="row justify-content-center">
        <div class="card  mb-3">
            <div class="card-header row justify-content-center">
                <h4 class="text-center mt-1 mb-1">
                    Tarefas da Semana - {{$semana}}

                </h4>
            </div>

            <div class="card-body">
                @foreach($data as $key=>$tarefas)
                @if($jaTem != $tarefas->dia)
                <ul class="list-group">
                
                    <li class="list-group-item">{{$tarefas->dia->format('d/m/Y')}}</li>
                    
                    <ul class="list-group">
                        <li class="list-group-item">{{$tarefas->horario}}</li>
                    
                        
                        <li class="list-group-item">{{$tarefas->tarefa}}</li>
                        
                    </ul>
                    
                </ul>
                @endif
                @php

                if($jaTem != $tarefas->dia)

                @endphp
                @endforeach

            </div>
        </div>
    </div>

    @include('layouts.index')
</div>
</div>


@endsection
@section('scripts')


@endsection
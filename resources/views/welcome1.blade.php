@extends('layouts.app')
@section('content')

<div class="container">
    <div>
        <a href="{{ route('home.index') }}">
            <img src="{{ asset('img/Logo.png')}}" class="col-md-4  offset-md-4 mb-5">
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="text-center">Bem vindo! Este site tem como principal funcionalidade, fazer o registro de suas metas/tarefas diárias,
                    as mesmas podem ser relacionadas a uma data e horário para que possa visualizar as tarefas do dia de forma ordenada.
                </h5>
            </div>
        </div>
    </div>
</div>
@foreach($newData as $key => $tarefa)
<div class="container">
    <div class="row justify-content-center">
        <div class="card border-dark mb-3">
            <div class="card-header row justify-content-center">
                <h4 class="text-center mt-1 mb-1">
                    Tarefas do dia - [ {{$key}} ]
                </h4>
            </div>

            <div class="card-body">
                @foreach($tarefa['horarios'] as $horario)
                <div class="card-header">
                    <p><b>{{$horario['horario']}} Hrs.</b></p>
                    <div class="">
                        <ul>
                            <div class="form-check form-switch">
                                <div class="right">
                                    <a type="button" class="btn-per btn-warning btn-sm" href="{{ route('homepage.edit', $horario['id']) }}"><i class="fas fa-edit"></i></a>
                                </div>
                                <input class="form-check-input checkFeito" type="checkbox" role="switch" tarefa_id="{{$horario['id']}}" {{ $horario['feito'] == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="">{{$horario['tarefa']}}</label>
                                <div class="right">
                                    <a type="button" class="btn-per btn-danger btn-sm" data href="{{ route('homepage.del', $horario['id']) }}"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('scripts')
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
                feito: feito,
                id: tarefa_id,
            },
            method: 'put'
        }).done(response => alert(response))
    })
</script>
@endsection
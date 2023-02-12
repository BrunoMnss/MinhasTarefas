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

<div class="container">
    <div class="row justify-content-center">
        <div class="card border-dark mb-3">
            <div class="card-header row justify-content-center">
                <h4 class="text-center mt-1 mb-1">
                    Tarefas do dia - [ <script>
                        document.write(new Date().toLocaleDateString());
                    </script> ] 
                </h4>
            </div>

            <div class="card-body">
                
            @foreach($data as $key=>$tarefas)

                <div class="card-header">

                    <p><b>{{$tarefas->horario}} Hrs.</b></p> 
                    <div class="">
                        <ul>

                            <div class="form-check form-switch">
                                
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{$tarefas->tarefa}}</label>

                                <div class="right">
                                    <a type="button" class="btn-per btn-danger btn-sm" href="{{ route('homepage.del', $tarefas->id) }}"><i class="fas fa-calendar-times"></i></a>
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



@endsection
@section('scripts')


@endsection
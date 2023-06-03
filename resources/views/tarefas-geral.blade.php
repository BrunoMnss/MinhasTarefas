@extends('layouts.app')
@section('content')

<div class="container">
    <div>
        <a href="{{ route('home.index') }}">
            <img src="{{ asset('img/Logo.png')}}" class="col-md-4  offset-md-4 mb-5">
        </a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="card  mb-3">
            <div class="card-header row justify-content-center">
                <h4 class="text-center mt-1 mb-1">
                    Tarefas da Semana - {{$semana}}

                </h4>
            </div>
            <div class="card-body">
                <div class=" mb-3">
                    <div class="center">
                        <a type="button" class="btn btn-primary btn-lg" href="{{ route('tarefa.create')}}">Adicionar Tarefa</a>
                    </div>
                </div>
                @foreach($data as $key => $tarefa)
                <div class="accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tarefa_{{$tarefa['id']}}" aria-expanded="false" aria-controls="tarefa_{{$tarefa['id']}}">
                                {{$key}}
                            </button>
                        </h2>
                        <div id="tarefa_{{$tarefa['id']}}" class="accordion collapse " aria-labelledby="heading_{{$tarefa['id']}}" data-bs-parent="#tarefa_{{$tarefa['id']}}">

                            @foreach($tarefa['horarios'] as $horario)
                            <button type="button" class="btn btn-dark btn-modal" data-bs-toggle="modal" data-bs-target="#tarefaModal{{$horario['id']}}">
                                {{$horario['horario']}}
                            </button>
                            <div class="modal fade" id="tarefaModal{{$horario['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{$key}} - [ {{$horario['horario']}} ]</h5>
                                            <div>
                                                <a type="button" class="btn-per btn-warning btn-sm" href="{{ route('tarefa.edit', $horario['id']) }}"><i class="fa-solid fa-gear"></i></a>
                                                <a type="button" class="btn-per btn-danger btn-sm" href="{{ route('tarefa.delete', $horario['id']) }}"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            {{$horario['tarefa']}}
                                        </div>
                                        <div class="modal-footer ">
                                            <a type="button" class="btn btn-secondary right" data-bs-dismiss="modal" href="{{ route('tarefa.index') }}">Fechar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    $('.checkFeito').on('click', function() {
                        tarefa_id = $(this).attr('tarefa_id')
                        feito = 1
                        if ($(this).is(':checked')) {
                            feito = 1
                        } else {
                            feito = 0
                        }

                        $.ajax({
                            url: "{{ route('homepage.editar.feito') }}",
                            data: {
                                "_token": "{{csrf_token()}}",
                                feito: feito,
                                id: tarefa_id,
                            },
                            method: 'put'
                        }).done(response => alert(response))
                    })
                </script>
                
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')

@endsection
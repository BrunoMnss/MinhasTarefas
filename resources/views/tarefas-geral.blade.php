@extends('layouts.app')
@section('content')

<div class="container">
    <div class="center">
        <a type="button" class="btn btn-primary btn-lg" href="{{ route('tarefa.create')}}">Adicionar Tarefa</a>
        <a type="button" class="btn btn-secondary btn-lg" href="">Editar Tarefa</a>
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
            
                @foreach($data as $key=>$tarefas)
                
                @if($jaTem != $tarefas->dia)
                
                <div class="accordion" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tarefas_{{$tarefas->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{$tarefas->dia->format('d/m/Y')}}
                            </button>
                        </h2>
                        
                        @endif

                        
                        <div id="tarefas_{{$tarefas->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        

                        
                                <button type="button" class="btn btn-dark btn-modal" data-bs-toggle="modal" data-bs-target="#tarefas{{$tarefas->id}}">
                                    {{$tarefas->horario}}

                                </button>
                            
                                
                                <!-- Modal -->
                                <div class="modal fade" id="tarefas{{$tarefas->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{$tarefas->dia->format('l')}} [{{$tarefas->horario}}]</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{$tarefas->tarefa}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        @if($jaTem != $tarefas->dia)
                    </div>

                </div>
                @endif

                @php

                if($jaTem != $tarefas->dia){
                $jaTem = $tarefas->dia;
                }

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
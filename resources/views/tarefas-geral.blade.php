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
                    Tarefas da semana - [ <script>
                        document.write(new Date().toLocaleDateString());
                    </script> ]
                </h4>
            </div>
            <div class="card-body">



                <div class="card-header">
                    <div>
                        <p><b>10:00hrs</b></p>
                        <div class="" style="display: flex; justify-content: flex-end">
                            <button type="button" class="btn btn-danger btn-sm">Apagar</button>
                        </div>
                    </div>

                    <div class="">
                        <ul>
                            <li>Fazer a Barba</li>
                            <li>Fazer a Barba</li>
                            <li>Fazer a Barba</li>
                            <!-- Default checkbox -->
                            <div class="form-check" style="display: flex; justify-content: flex-end">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault"></label>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="card-header">
                    <p><b>15:00hrs</b></p>

                    <div class="">
                        <ul>
                            <li>Fazer a Barba</li>
                            <li>Fazer a Barba</li>
                            <li>Fazer a Barba</li>
                            <!-- Default checkbox -->
                            <div class="form-check" style="display: flex; justify-content: flex-end">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">Tarefa concluida?</label>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="card-header">
                    <p><b>20:00hrs</b></p>

                    <div class="">
                        <ul>
                            <li>Fazer a Barba</li>
                            <li>Fazer a Barba</li>
                            <li>Fazer a Barba</li>
                            <!-- Default checkbox -->
                            <div class="form-check" style="display: flex; justify-content: flex-end">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">Tarefa concluida?</label>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.index')
    </div>
</div>



@endsection
@section('scripts')


@endsection
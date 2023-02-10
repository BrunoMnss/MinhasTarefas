@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a href="">
                    <img src="{{ asset('img/Logo.png')}}" class="col-md-4  offset-md-4 mb-5">
                </a>
            </div>
            <div class="card">
                <div class="card-header mb-5" style="text-align: center;"><b>{{ __('Adicionar Tarefa') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tarefa.store') }}">
                        @csrf


                        <div class="center-add">

                            <label class="data" for="birthday"><b>Data:</b></label>
                            <input type="date" id="birthday" name="dia">



                            <label class="horas" for="appt"><b>Horario:</b></label>
                            <input type="time" id="appt" name="horario">


                        </div>


                        <div class="center-add">

                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="tarefa"></textarea>
                                <label for="floatingTextarea2"></label>
                            </div>

                            <div class="row justify-content-center">
                                @if($errors->has('tarefa'))
                                {{ $errors->first('tarefa') }}
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                @if($errors->has('dia'))
                                {{ $errors->first('dia') }}
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                @if($errors->has('horario'))
                                {{ $errors->first('horario') }}
                                @endif
                            </div>

                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <a type="submit" class="btn btn-danger" style="width: 25%;" href="{{ route('tarefa.index') }}">Cancelar</a>
                                <button type="submit" class="btn btn-success btn-add" style="width: 25%;">Salvar</button>
                            </div>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
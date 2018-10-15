@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
    <h1>Ajuda</h1>
@stop

@section('content')

    @if ($mesa->status->id == 1)
        <div>
            <form class="form-horizontal" method="POST" action="{{ route('ajuda.solicitar') }}">

                {{ csrf_field() }}

                <button type="submit" class="btn btn-info pull-left">Solicitar Ajuda</button>

            </form>
        </div>
    @elseif ($mesa->status->id == 2)
        <div class="alert alert-info alert-dismissible">
            <h4><i class="icon fa fa-warning"> {{ $mesa->user->name }}</i></h4>

            <p>Situação: Em Atendimento</p>

        </div>
    @elseif($mesa->status->id == 3)  
        <div class="alert alert-info alert-dismissible">
            <h4><i class="icon fa fa-warning"></i></h4>

            <p>Situação: Aguardando Atendente</p>

        </div>
    @else
        <div class="alert alert-info alert-dismissible">
            <h4><i class="icon fa fa-warning"> {{ $mesa->user->name }}</i></h4>

            <p>Situação: Em Atendimento</p>
            <p>Recebendo ajuda de: {{ $mesa->atendente->name }}</p>

        </div>

    @endif
@stop


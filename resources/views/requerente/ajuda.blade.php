@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
    <h1>Ajuda</h1>
@stop

@section('content')


        @if (isset($mesa))
            <div class="alert alert-warning alert-dismissible">
                <h4><i class="icon fa fa-warning"> Status: {{ $mesa->status->name }}</i></h4>
                
            </div>
        @else 
            <div>
                <form class="form-horizontal" method="POST" action="{{ route('ajuda.solicitar') }}">
        
                    {{ csrf_field() }}
        
                    <button type="submit" class="btn btn-info pull-left">Solicitar Ajuda</button>
        
                </form>
            </div>
        @endif
@stop


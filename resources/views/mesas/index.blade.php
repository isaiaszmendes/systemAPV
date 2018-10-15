@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
    <h1>Mesas </h1>
@stop

@section('content')

    <div class="box-body">
        @forelse ($mesas as $mesa)
           @if ($mesa->status->id == 1)
                <div class="alert alert-success alert-dismissible">
                    <h4><i class="icon fa fa-warning"> {{ $mesa->user->name }}</i></h4>
                    <h5><b>Status: </b>{{ $mesa->status->name }}</h5>                
                </div>
            @elseif($mesa->status->id == 2)
                <div class="alert alert-info alert-dismissible">
                    <h4><i class="icon fa fa-warning"> {{ $mesa->user->name }}</i></h4>
                    <h5><b>Status: </b>{{ $mesa->status->name }}</h5>
              
                </div>   
            @elseif($mesa->status->id == 3)
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-warning"> {{ $mesa->user->name }}</i></h4>
                    <h5><b>Status: </b>{{ $mesa->status->name }}</h5>
                    <p class="text-right"><a href="">Clique Para Atender</a></p>                  
                </div> 
            @else
                <div class="alert alert-danger alert-dismissible">
                    <h4><i class="icon fa fa-warning"> {{ $mesa->user->name }}</i></h4>
                    <h5><b>Status: </b>{{ $mesa->status->name }}</h5>                 
                </div>               
           @endif
        @empty
            <h3>Não há chamados ativos</h3>
        @endforelse  
{{-- 
        {!! $mesas->links() !!} --}}
    </div>  


   
@stop
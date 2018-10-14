@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h3>Bem vindo, {{ auth()->user()->name }}!</h3>
    
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
        Optio magni libero tempora aperiam recusandae omnis alias accusamus non, 
        assumenda repellendus ut aspernatur enim deleniti culpa iusto corporis
         temporibus quos repudiandae!
    </p>

    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            Optio magni libero tempora aperiam recusandae omnis alias accusamus non, 
            assumenda repellendus ut aspernatur enim deleniti culpa iusto corporis
             temporibus quos repudiandae!
        </p>
@stop
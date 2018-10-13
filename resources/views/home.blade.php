@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    @forelse ($chamados as $chamado)
        <h1>{{ $chamado->title }}</h1>
        <p>{{ $chamado->description }}</p><br>
        <b>Author: {{ $chamado->user->name }}</b>
        <a href="{{ url('home/1/update') }}">Vai</a>
    @empty
        <p>não existe nenhum nego cadastrado</p>
    @endforelse
@stop
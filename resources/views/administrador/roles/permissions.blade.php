@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
<h1><i class='glyphicon glyphicon-cog'></i> Função {{ $role->name }} </h1>
@stop


@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Permissões cadastrados</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                            </tr>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
            <a href="{{ route('roles') }}" class="btn btn-info btn-sm pull-left">Voltar</a>
        </div>
    </div>
@stop


@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
    <h1><i class='glyphicon glyphicon-cog'></i> Permissões </h1>
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
                                <th></th>
                            </tr>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>
                                        <a href="{{ route('permission.roles', $permission->id) }}" class="btn btn-info btn-sm pull-right">Função</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop


@extends('adminlte::page')

@section('title', 'System APV')

@section('content_header')
<h1><i class='glyphicon glyphicon-user'></i> Usuários </h1>
@stop

@section('css')
    <style>
        .btn-info{
            margin-right: 5px;
        }
    </style>
@stop

@section('content')

    <div class="form">
        <form method="POST" class="form form-inline" action="{{ route('user.search') }}">
            {{ csrf_field() }}
            <input type="text" name="name" class="form-control input-sm" placeholder="Nome" title="Pesquisa pelo nome">
            <input type="text" name="email" class="form-control input-sm" placeholder="example@email.com" title="Pesquisa pelo e-mail">
            <select name="role" class="form-control input-sm">
                <option value="">Selecione</option>
                <option value="1">Administrador</option>
                <option value="2">Atendente</option>
                <option value="3">Requerente</option>
            </select>
            <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i></button>
        </form>
    </div><br>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Usuários cadastrados</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Função</th>
                                <th></th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @forelse ($user->roles as $role)
                                            @if ($role->id == '1')
                                                <span class="label label-primary">{{ $role->name }}</span>
                                            @elseif($role->id == '2')
                                                <span class="label label-success">{{ $role->name }}</span>
                                            @else
                                                <span class="label label-warning">{{ $role->name }}</span>
                                            @endif
                                        @empty
                                            <span class="label label-danger">Não Possui</span>
                                        @endforelse                                             
                                    </td>
                                    <td class="pull-right">                                                                              
                                        <button class="btn btn-info btn-sm  " data-toggle="modal" data-target="#user"
                                                data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}"
                                                data-email="{{ $user->email }}"
                                                data-role="{{ $user->roles }}">
                                            <i class="glyphicon glyphicon-pencil"> </i> Editar
                                        </button>
                                        @if (auth()->user()->id != $user->id) 
                                            <button class="btn btn-danger btn-sm  " data-toggle="modal" data-target="#excluir"
                                                data-id="{{ $user->id }}"
                                                data-title="Excluir o usuário {{ $user->name }}?"
                                                data-route="{{ route('user.destroy', $user->id ) }}">
                                                <i class="glyphicon glyphicon-remove"></i> Excluir
                                            </button>
                                        @endif 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#user"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>


    <div class="modal fade" id="user" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <form method="POST" class="form form-group" id="formModal"> {{-- action Pelo js --}}
                    <div class="modal-body">                    
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6"> 
                                <label for="name">Nome</label>
                                <input class="form-control input-sm" type="text" name="name" placeholder="Nome">
                            </div>
                            <div class="col-md-6"> 
                                <label for="email">E-mail</label>
                                <input class="form-control input-sm" type="text" name="email" placeholder="example@email.com">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-3"> 
                                <label for="role">Função</label>
                                <select name="role" class="form-control input-sm">
                                    <option value="">Selecione</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Atendente</option>
                                    <option value="3">Requerente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn"  value="">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center">
        @if(isset($dataForm))
            {!! $users->appends($dataForm)->links() !!}
        @else
            {!! $users->links() !!}
        @endif
    </div>

@stop

@section('js')
    <script type="text/javascript">

        // Alimenta o modal com informações de cada usuário
        $('#user').on('show.bs.modal', function (e)
        {
            if ($(e.relatedTarget).attr('data-id'))
            {
                // Modal para Editar
                let id = $(e.relatedTarget).attr('data-id');
                let name = $(e.relatedTarget).attr('data-name');
                let email = $(e.relatedTarget).attr('data-email');
                $(this).find('.modal-title').text(` Editar ${name}`); 
                $(this).find('.modal-footer input').removeClass('btn-success').addClass('btn-primary').attr('value', 'Editar');
                $(this).find('form input[name="name"]').attr('value', `${name}`);
                $(this).find('form input[name="email"]').attr('value', `${email}`);
                $(this).find('form').append(`<input type="hidden" name="_method" value="PUT">`);
                $(this).find('form').attr('action', ` {{ route('user.update', '') }}/${id}`);
            }else
            {
                // Modal para Adicionar
                $(this).find('.modal-title').text('Adicionar novo Usuário');
                $(this).find('.modal-footer input').removeClass('btn-primary').addClass('btn-success').attr('value', 'Adicionar');
                $(this).find('form input[type="text"]').attr('value', '');
                $(this).find('form select option[value="0"]').attr("selected",true);
                $(this).find('form').attr('action', `{{ route('user.create')}}`);
            }
        });
    </script>

    @include('scripts.modal_delete')
@stop
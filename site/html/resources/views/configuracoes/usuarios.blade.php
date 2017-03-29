            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users"></i> Usuários
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-usuarios' onclick="
                                $('#frmUsuarios').attr('action','{{ route('register') }}');
                                $('[name=name]').val('');
                                $('[name=email]').val('');
                                $('[name=tipo]').val('');
                                $('[name=password]').val('');
                                $('[name=password-confirm]').val('');
                            ">Novo</a>
                            <div class="modal fade" id="modal-usuarios">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Usuários</h4>
                                        </div>
                                        <div class="modal-body">
                                                {!! Form::open(['route' => 'register', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'frmUsuarios']) !!}
                                                {!! Form::hidden('id', null, ['id' => 'idUsuario']) !!}
                                            <div class="form-group col-lg-12">
                                                {!! Form::label('name', 'Nome', ['class' => 'control-label','placeholder'=>'Nome Completo']) !!}
                                                {!! Form::text('name', old('name', null), ['class'=>'form-control','required'=>'required','autofocus'=>'autofocus']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                                {!! Form::label('email', 'E-Mail', ['class' => 'control-label','placeholder'=>'E-Mail']) !!}
                                                {!! Form::email('email', old('email', null), ['class'=>'form-control','required'=>'required']) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}
                                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group col-lg-6">
                                                {!! Form::label('password_confirmation', 'Confirmar Senha', ['class' => 'control-label']) !!}
                                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                                {!! Form::label('tipo', 'Tipo de usuários', ['class' => 'control-label']) !!}
                                                {!! Form::select('tipo', $tipoUsers->pluck('tipo','id'), 0, ['class'=>'form-control','placeholder'=>'Selecione...']) !!}
                                            </div>
                                            <div class="modal-footer">
                                                {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                                {!! Form::submit('Salvar', ['class' => 'btn btn-primary pull-right']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="panel-body"> --}}
                    <div class="table-responsive">
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th class="col-lg-4">Usuário</th>
                                    <th class="col-lg-4">Tipo</th>
                                    <th colspan="2" class="col-lg-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $u)
                                    <tr>
                                        <td class="col-lg-4">{{ $u->name }}</td>
                                        <td class="col-lg-4">{{ $u->tipo->tipo }}</td>
                                        <td class="col-lg-2 text-right"><a class="btn btn-xs btn-primary" onclick="
                                            $('#frmUsuarios').attr('action','{{ route('updateUser') }}');
                                            $('#idUsuario').val('{{ $u->id }}');
                                            $('[name=name]').val('{{ $u->name }}');
                                            $('[name=email]').val('{{ $u->email }}');
                                            $('[name=tipo]').val('{{ $u->tipoUser_id }}');
                                            $('[name=password]').val('');
                                            $('[name=password-confirm]').val('');
                                        " data-toggle="modal" href='#modal-usuarios'>Editar</a></td>
                                        <td class="col-lg-2 text-right">
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modal-Delete-User' onclick="
                                                $('#idApagarUser').val('{{ $u->id }}');
                                                $('#userApagar').html('{{ $u->name }}');
                                            ">Apagar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="modal-Delete-User">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Excluir Usuário</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['route'=>'deleteUser','method'=>'POST']) !!}
                                        {!! Form::hidden('id', null,['id'=>'idApagarUser']) !!}
                                        <h3>Tem certeza que deseja apagar o usuário:
                                        <i id="userApagar"></i>
                                        ?</h3>
                                        {!! Form::reset('Cancelar', ['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
                                        {!! Form::submit('Apagar', ['class'=>'btn btn-danger pull-right']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
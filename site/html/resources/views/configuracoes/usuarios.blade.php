            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users"></i> Usuários
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-usuarios'>Novo</a>
                            <div class="modal fade" id="modal-usuarios">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Usuários</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'register', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('nome', 'Nome', ['class' => 'control-label','placeholder'=>'Nome Completo']) !!}
                                            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('tipo', 'Tipo de usuários', ['class' => 'control-label']) !!}
                                            {!! Form::select('tipo', $tipoUsers->pluck('tipo','id'), 0, ['class'=>'form-control','placeholder'=>'Selecione...']) !!}
                                            </div>
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
                                        <td class="col-lg-2 text-right"><a class="btn btn-xs btn-primary">Editar</a></td>
                                        <td class="col-lg-2 text-right"><a class="btn btn-xs btn-danger">Apagar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                {{-- </div> --}}
            </div>
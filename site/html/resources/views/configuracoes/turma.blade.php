            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user"></i> Turma
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-turma'>Novo</a>
                            <div class="modal fade" id="modal-turma">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Turma</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'turma.salvar', 'method' => 'POST', 'id' => '', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('turma', 'Turma', ['class' => 'control-label']) !!}
                                            {!! Form::text('turma', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('curso', 'Cursos', ['class' => 'control-label']) !!}
                                            {!! Form::select('curso', $curso->pluck('curso','id'), 0, ['class'=>'form-control','placeholder'=>'Selecione...']) !!}
                                            </div>
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'data-form-id' => '#']) !!}
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
                                    <th class="col-lg-2">Turma</th>
                                    <th class="col-lg-6 text-center">Curso</th>
                                    <th colspan="2" class="col-lg-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($turma as $t)
                                    <tr>
                                        <td class="col-lg-2">{{ $t->turma }}</td>
                                        <td class="col-lg-6 text-center">{{ $t->curso->curso }}</td>
                                        <td class="col-lg-2"><a class="btn btn-xs btn-primary">Editar</a></td>
                                        <td class="col-lg-2"><a class="btn btn-xs btn-danger">Apagar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                {{-- </div> --}}
            </div>
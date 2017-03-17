            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-book"></i> Cursos
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-cursos'>Novo</a>
                            <div class="modal fade" id="modal-cursos">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Curso</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'curso.salvar', 'method' => 'POST', 'id' => 'frmcertificado', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('curso', 'Curso', ['class' => 'control-label']) !!}
                                            {!! Form::text('curso', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('campus', 'Campus', ['class' => 'control-label']) !!}
                                            {!! Form::select('campus', $campus->pluck('campus','id'), 0, ['class'=>'form-control','placeholder'=>'Selecione...']) !!}
                                            </div>
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'data-form-id' => '#frmcertificado']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary pull-right']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-fixed">
                        <thead>
                            <tr>
                                <th class="col-lg-6">Curso</th>
                                <th class="col-lg-2">Campus</th>
                                <th colspan="2" class="col-lg-4 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($curso as $c)
                                <tr>
                                    <td class="col-lg-6">{{ $c->curso }}</td>
                                    <td class="col-lg-2 text-center">{{ $c->campus->campus }}</td>
                                    <td class="col-lg-2 text-right"><a class="btn btn-xs btn-primary">Editar</a></td>
                                    <td class="col-lg-2 text-right"><a class="btn btn-xs btn-danger">Apagar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
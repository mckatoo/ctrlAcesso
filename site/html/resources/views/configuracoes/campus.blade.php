            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-university"></i> Campus
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-campus'>Novo</a>
                            <div class="modal fade" id="modal-campus">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Campus</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'campus.salvar', 'method' => 'POST', 'enctype' => 'multipart/form-data','id' => 'frmCampus']) !!}
                                            {!! Form::hidden('id', null, ['id'=>'id']) !!}
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('campus', 'Campus', ['class' => 'control-label']) !!}
                                            {!! Form::text('campus', null, ['class'=>'form-control', 'id'=>'campus']) !!}
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
                <div class="table-responsive">
                    <table class="table table-fixed">
                        <thead>
                            <tr>
                                <th class="col-lg-6">Campus</th>
                                <th class="col-lg-2">Cadastrado</th>
                                <th colspan="2" class="col-lg-4 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campus as $c)
                                <tr>
                                    <td class="col-lg-6">{{ $c->campus }}</td>
                                    <td class="col-lg-2 text-center">{{ $c->created_at->format('d/m/Y') }}</td>
                                    <td class="col-lg-2 text-right">
                                        <a class="btn btn-xs btn-primary" data-toggle="modal" href='#modal-campus' onclick="
                                        $('#id').val('{{ $c->id }}');
                                        $('#campus').val('{{ $c->campus }}');
                                        ">Editar</a>
                                    </td>
                                    <td class="col-lg-2 text-right">
                                        <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modal-campus-apagar{{ $c->id }}'>Apagar</a>
                                        <div class="modal fade" id="modal-campus-apagar{{ $c->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header alert-danger">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title text-center">Apagar Campus</h4>
                                                    </div>
                                                    <div class="modal-body panel-danger">
                                                        <h3>Tem certeza que deseja apagar o campus {{ $c->campus }}?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::open(['route'=>'campus.apagar']) !!}
                                                        {!! Form::hidden('id', $c->id) !!}
                                                        {!! Form::reset('Cancelar', ['class'=>'btn btn-default']) !!}
                                                        {!! Form::submit('Apagar', ['class'=>'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
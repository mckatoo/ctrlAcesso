            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users"></i> Turma
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-turma'
                            onclick="
                                $('[name=id]').val('');
                                $('[name=turma]').val('');
                                $('[name=curso]').val('');
                            ">Novo</a>
                            <div class="modal fade" id="modal-turma">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Turma</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'turma.salvar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group col-lg-12">
                                            {!! Form::hidden('id', null, []) !!}
                                            {!! Form::label('turma', 'Turma', ['class' => 'control-label']) !!}
                                            {!! Form::text('turma', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('curso', 'Cursos', ['class' => 'control-label']) !!}
                                            {!! Form::select('curso', $curso->pluck('curso','id'), 0, ['class'=>'form-control','placeholder'=>'Selecione...']) !!}
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
                                    <th class="col-lg-2">Turma</th>
                                    <th class="col-lg-6 text-center">Curso</th>
                                    <th colspan="2" class="col-lg-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($turma as $t)
                                    @if ($t->curso['curso'] == '')
                                        <tr class="alert-danger">
                                    @else
                                        <tr>
                                    @endif
                                        <td class="col-lg-3">{{ $t->turma }}</td>
                                        <td class="col-lg-5 text-center">{{ $t->curso['curso'] }}</td>
                                        <td class="col-lg-2"><a class="btn btn-xs btn-primary" data-toggle="modal" href='#modal-turma'
                                        onclick="
                                            $('[name=id]').val('{{ $t->id }}');
                                            $('[name=turma]').val('{{ $t->turma }}');
                                            $('[name=curso]').val('{{ $t->curso_id }}');
                                        ">Editar</a></td>
                                        <td class="col-lg-2">
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modalApagarTurma'
                                            onclick="
                                                $('#idApagarTurma').val('{{ $t->id }}');
                                                $('#turmaApagar').html('{{ $t->turma }}');
                                            ">Apagar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="modalApagarTurma">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header alert-danger">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Apagar Turma</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['route'=>'turma.apagar','method'=>'POST']) !!}
                                        {!! Form::hidden('id', null,['id'=>'idApagarTurma']) !!}
                                        <h3>Tem certeza que deseja apagar a turma:
                                        <i id="turmaApagar"></i>
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
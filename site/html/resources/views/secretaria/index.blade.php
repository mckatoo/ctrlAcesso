@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        @include('layouts.sidebar')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if (session('erro'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Atenção!</strong> <a href="{{ route('secretaria.configuracoes') }}">{{ session('erro') }}</a>
          </div>
        @endif
        @if (isset($erro))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Atenção!</strong> <a href="{{ route('secretaria.configuracoes') }}">{{ $erro }}</a>
          </div>
        @endif
        @if (session('sucesso'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Sucesso!</strong> {{ session('sucesso') }}
          </div>
        @endif
          <h1 class="page-header">Secretaria</h1>

          <form action="{{ route('importar') }}" method="POST" id="frmUpload" class="form-inline" role="form" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="form-group">
              <label class="control-label" for="file">Importar CSV</label>
              <input type="file" accept=".csv" name="arquivo" class="form-control" id="fileUpload" required="required">
            </div>
            <a href="#" id="btnUpload" class="btn btn-primary">Enviar</a>
          </form>

          <h2 class="sub-header">Alunos com Contrato Aceito</h2>

          <div class="">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Matrícula</th>
                  <th>Nome</th>
                  <th>Campus</th>
                  <th>Curso</th>
                  <th>Turma</th>
                  <th>Aceite Contrato</th>
                  <th>Entradas</th>
                  <th colspan="2"><a class="btn btn-block btn-primary" data-toggle="modal" href='#modal-aluno'>Novo</a>
                  <div class="modal fade" id="modal-aluno">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Aluno</h4>
                        </div>
                        <div class="modal-body">
                          {!! Form::open(['route'=>'aluno.salvar','method'=>'POST']) !!}
                          {!! Form::hidden('id', null) !!}
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="form-group col-lg-12">
                                {!! Form::label('nome', 'Nome', ['class'=>'control-label']) !!}
                                {!! Form::text('nome', null, ['autofocus'=>'autofocus','class'=>'form-control','required'=>'required','title'=>'Nome Completo']) !!}
                              </div>
                              <div class="form-group col-lg-6">
                                {!! Form::label('matricula', 'Matrícula', ['class'=>'control-label']) !!}
                                {!! Form::text('matricula', null, ['class'=>'form-control','required'=>'required','title'=>'RA']) !!}
                              </div>
                              <div class="form-group col-lg-6">
                                {!! Form::label('campus', 'Campus', ['class'=>'control-label']) !!}
                                {!! Form::select('campus', $campus->pluck('campus','id'), 0, ['class'=>'form-control','required'=>'required','placeholder'=>'Selecione...']) !!}
                              </div>
                              <div class="form-group col-lg-12">
                                {!! Form::label('curso', 'Curso', ['class'=>'control-label']) !!}
                                {!! Form::select('curso', $curso->pluck('curso','id'), 0, ['class'=>'form-control','required'=>'required','placeholder'=>'Selecione...']) !!}
                              </div>
                              <div class="form-group col-lg-4">
                                {!! Form::label('turma', 'Turma', ['class'=>'control-label']) !!}
                                {!! Form::select('turma', $turma->pluck('turma','id'), 0, ['class'=>'form-control','required'=>'required','placeholder'=>'Selecione...']) !!}
                              </div>
                              <div class="form-group col-lg-4">
                                {!! Form::label('aceite', 'Aceite do Contrato', ['class'=>'control-label']) !!}
                                {!! Form::text('aceite', null, ['class'=>'form-control datepicker','required'=>'required','title'=>'Data do aceite no contrato.']) !!}
                              </div>
                              <div class="form-group col-lg-4">
                                {!! Form::label('entradas', 'Entradas', ['class'=>'control-label']) !!}
                                {!! Form::number('entradas', null, ['class'=>'form-control','title'=>'Entradas Permitidas já usadas']) !!}
                              </div>
                            </div>
                            <div class="panel-footer">
                              {!! Form::reset('Cancelar', ['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
                              {!! Form::submit('Salvar', ['class'=>'btn btn-primary pull-right']) !!}
                              {!! Form::close() !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </th>
                </tr>
              </thead>
              <tbody>
              @if (isset($incoerenciaAluno))
                <div class="hidden">{{ $tabela = $incoerenciaAluno }}</div>
              @else
                <div class="hidden">{{ $tabela = $aluno }}</div>
              @endif

              @foreach ($tabela as $a)
                @if ((filter_var($a->nome,FILTER_SANITIZE_NUMBER_INT) !== '')or($a->turma->curso['campus_id'] == '')or($a->turma->curso['curso'] == ''))
                  <tr class="alert-danger">
                @else
                  <tr>
                @endif
                  <td>{{ $a->matricula }}</td>
                  <td>{{ $a->nome }}</td>
                  @if ($a->turma->curso['campus_id'] != '')
                    <td>{{ $campus->where('id','=',$a->turma->curso['campus_id'])->first()->campus }}</td>
                  @else
                    <td></td>
                  @endif
                  <td>{{ $a->turma->curso['curso'] }}</td>
                  <td>{{ $a->turma['turma'] }}</td>
                  <td>{{ $a->aceite_contrato->format('d/m/Y') }}</td>
                  <td>{{ $a->entradas }}</td>
                  <td>
                    <a class="btn btn-xs btn-primary" data-toggle="modal" href='#modal-aluno'
                    onclick="
                      $('[name=id]').val('{{ $a->id }}');
                      $('[name=matricula]').val('{{ $a->matricula }}');
                      $('[name=nome]').val('{{ $a->nome }}');
                      $('[name=campus]').val('{{ $a->turma->curso['campus_id'] }}');
                      $('[name=curso]').val('{{ $a->turma->curso_id }}');
                      $('[name=turma]').val('{{ $a->turma_id }}');
                      $('[name=aceite]').val('{{ $a->aceite_contrato->format('d/m/Y') }}');
                      $('[name=entradas]').val('{{ $a->entradas }}');
                    ">Editar</a>
                  </td>
                  <td>
                    <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modalDelete'
                    onclick="
                      $('[name=idApagar]').val('{{ $a->id }}');
                      $('.matriculaApagar').html('{{ $a->matricula }}');
                      $('.alunoApagar').html('{{ $a->nome }}');
                    "
                    >Apagar</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @if (!isset($incoerenciaAluno))
              <div class="text-center">
                {{ $aluno->links() }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="loading hidden">
      <div class="loading-msg">Carregando...</div>
    </div>


    <!-- modal para apagar -->
    <div class="modal fade" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header alert-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Apagar</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'aluno.apagar','method'=>'POST']) !!}
                {!! Form::hidden('idApagar', null) !!}
                <h3>Tem certeza que deseja apagar o aluno:
                <i class="alunoApagar"></i>
                de matrícula:
                <i class="matriculaApagar"></i>
                ?</h3>
                {!! Form::reset('Cancelar', ['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
                {!! Form::submit('Apagar', ['class'=>'btn btn-danger pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ mix('js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@stop
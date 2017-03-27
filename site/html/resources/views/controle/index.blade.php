@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
@stop

@section('content')
    <div class="container-fluid">
      <div class="row">
        @include('layouts.sidebar')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('erro'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Atenção!</strong> {{ session('erro') }}
          </div>
        @endif
        @if (isset($erro))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Atenção!</strong> {{ $erro }}
          </div>
        @endif
        @if (session('sucesso'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Sucesso!</strong> {{ session('sucesso') }}
          </div>
        @endif
          <div class="col-lg-12 col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                {!! Form::open(['route'=>'controle.pesquisar','method'=>'POST']) !!}
                <div class="input-group custom-search-form">
                  {!! Form::text('pesquisar', null, ['class' => 'form-control', 'placeholder' => 'Pesquisar...']) !!}
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
                {!! Form::close() !!}
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th class="text-center">Liberações Restantes</th>
                        <th class="text-center">Liberar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($aluno as $a)
                        <tr>
                          <td>{{ $a->matricula }}</td>
                          <td>{{ $a->nome }}</td>
                          <td class="text-center">{{ 3 - $a->entradas }}</td>
                          @if ($a->entradas < 3)
                            <td class="text-center">
                              <a class="btn btn-success" data-toggle="modal" href='#modal-liberar' onclick="
                                $('#Aluno').html('{{ $a->nome }}');
                                $('#idLiberar').val('{{ $a->id }}');
                              "><i class="fa fa-plus"></i></a>
                            </td>
                          @else
                            <td class="text-center"><a href="#" class="btn btn-default"><i class="fa fa-plus"></i></a></td>
                          @endif
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @if ($count > 5)
                <div class="panel-footer text-center">
                  {{ $aluno->links() }}
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-liberar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Acesso Liberado</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route'=>'controle.liberar','method'=>'POST']) !!}
              {!! Form::hidden('id', null,['id'=>'idLiberar']) !!}
              <h3>Liberar acesso para <strong id="Aluno"></strong>?</h3>
              {!! Form::reset('Cancelar', ['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
              {!! Form::submit('Liberar', ['class'=>'btn btn-primary pull-right']) !!}
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
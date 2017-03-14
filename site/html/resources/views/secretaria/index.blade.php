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
            <strong>Atenção!</strong> {{ session('erro') }}
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
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Matrícula</th>
                  <th>Nome</th>
                  <th>Campus</th>
                  <th>Curso</th>
                  <th>Turma</th>
                  <th>Aceite Contrato</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($aluno as $a)
                @if ((filter_var($a->nome,FILTER_SANITIZE_NUMBER_INT) !== '')or($a->turma->curso->campus['campus'] == ''))
                  <tr class="alert-danger">
                @else
                  <tr>
                @endif
                  <td>{{ $a->matricula }}</td>
                  <td>{{ $a->nome }}</td>
                  <td>{{ $a->turma->curso->campus['campus'] }}</td>
                  <td>{{ $a->turma->curso->curso }}</td>
                  <td>{{ $a->turma->turma }}</td>
                  <td>{{ $a->aceite_contrato->format('d/m/Y') }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-center">
              {{ $aluno->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="loading hidden">
      <div class="loading-msg">Carregando...</div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ mix('js/dashboard.js') }}"></script>
@stop
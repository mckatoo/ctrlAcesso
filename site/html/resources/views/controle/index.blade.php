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
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ mix('js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@stop
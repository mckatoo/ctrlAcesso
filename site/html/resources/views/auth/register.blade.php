{{-- @extends('layouts.app') --}}
@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
    @include('layouts.sidebar')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'updateUser', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'frmUsuarios']) !!}
                    {!! Form::hidden('id', Auth::user()->id, ['id' => 'idUsuario']) !!}
                    <div class="form-group col-lg-12">
                        {!! Form::label('name', 'Nome', ['class' => 'control-label','placeholder'=>'Nome Completo']) !!}
                        {!! Form::text('name', old('name', Auth::user()->name), ['class'=>'form-control','required'=>'required','autofocus'=>'autofocus']) !!}
                    </div>
                    <div class="form-group col-lg-12">
                        {!! Form::label('email', 'E-Mail', ['class' => 'control-label','placeholder'=>'E-Mail']) !!}
                        {!! Form::email('email', old('email', Auth::user()->email), ['class'=>'form-control','required'=>'required']) !!}
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
                        {!! Form::select('tipo', $tipoUsers->pluck('tipo','id'), Auth::user()->tipoUser_id, ['class'=>'form-control']) !!}
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
@endsection

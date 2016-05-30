@extends('admin.main')

@section('title','login')

@section('content')
	{!! Form::open(['route' => 'admin.auth.login','method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('login','Usuario') !!}
			{!! Form::text('login',null,['class' => 'form-control','placeholder'=>'Usuario','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Contraseña') !!}
			{!! Form::password('password',['class' => 'form-control','placeholder'=>'********','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection
@extends('admin.main')

@section('title','Ingresar pregunta')

@section('content')

{!! Form::open(['route' => 'actaSocializacion.store','method' => 'POST']) !!}
	
	<div class="form-group">
		{!! Form::label('name','Enunciado') !!}
		{!! Form::textArea('enunciado',null,['class' => 'form-control','placeholder'=>'Enunciado de la pregunta completo, ejemplo: 1. Enunciado','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Registro',['class'=>'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection
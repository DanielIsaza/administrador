@extends('admin.main')

@section('title','Editar pregunta')

@section('content')

{!! Form::open(['route' => ['actaSocializacion.update', $enunciado->numeroPregunta], 'method' => 'PUT']) !!}
	
	<div class="form-group">
		{!! Form::label('name','Enunciado') !!}
		{!! Form::textArea('enunciado',$enunciado->enunciado,['class' => 'form-control','placeholder'=>'Enunciado de la pregunta completo, ejemplo: 1. Enunciado','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Registro',['class'=>'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection
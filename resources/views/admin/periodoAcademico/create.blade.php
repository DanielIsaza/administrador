@extends('admin.main')

@section('title','Crear periodo academico')

@section('content')
	{!! Form::open(['route' => 'periodoAcademico.store','method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre periodo academico') !!}
		{!! Form::text('periodo',null,['class' => 'form-control','placeholder'=>'Nombre','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Registro',['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
@endsection
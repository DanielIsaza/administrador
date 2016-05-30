@extends('admin.main')

@section('title','Editar periodo academico')

@section('content')

	{!! Form::open(['route' => ['periodoAcademico.update', $periodo->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('name','Identificador periodo academico') !!}
		{!! Form::text('id',$periodo->id,['class' => 'form-control','placeholder'=>'','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre periodo academico') !!}
		{!! Form::text('periodo',$periodo->periodo,['class' => 'form-control','placeholder'=>'','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
@endsection
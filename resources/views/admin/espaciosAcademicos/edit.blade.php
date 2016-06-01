@extends('admin.main')
@section('title','Editar Espacio Academico')

@section('content')

	{!! Form::open(['route' => ['espaciosAcademicos.update', $espacioAcademico->idEspacioAcademico], 'method' => 'PUT']) !!}

		<div class="form-group">
			{!! Form::label('name','Nombre del espacio académico') !!}
			{!! Form::text('nombre',$espacioAcademico->nombre,['class' => 'form-control','placeholder'=>'','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endSection 
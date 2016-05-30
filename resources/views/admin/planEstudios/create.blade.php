@extends('admin.main')

@section('title','Crear plan de estudio')

@section('content')
	{!! Form::open(['route' => 'planEstudios.store','method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('name','Identificador') !!}
		{!! Form::text('idPlanEstudio',null,['class' => 'form-control','placeholder'=>'Identificador',null]) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('nombrePlanEstudio',null,['class' => 'form-control','placeholder'=>'Nombre','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Programa academico') !!}
		{!! Form::select('Programa_idPrograma',$programa,null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Registro',['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
@endsection
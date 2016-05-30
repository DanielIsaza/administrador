@extends('admin.main')

@section('title','Editar Plan de estudios')

@section('content')

	{!! Form::open(['route' => ['planEstudios.update', $planEstudio->idPlanEstudio], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('name','Identificador plan de estudios') !!}
		{!! Form::text('idPlanEstudio',$planEstudio->idPlanEstudio,['class' => 'form-control','placeholder'=>'','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre plan de estudios') !!}
		{!! Form::text('nombrePlanEstudio',$planEstudio->nombrePlanEstudio,['class' => 'form-control','placeholder'=>'','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
@endsection
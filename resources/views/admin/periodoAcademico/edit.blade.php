@extends('admin.main')

@section('title','Editar periodo acad&eacute;mico')

@section('content')

	{!! Form::open(['route' => ['periodoAcademico.update', $periodo->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('name','Nombre periodo acad&eacute;mico') !!}
		{!! Form::text('periodo',$periodo->periodo,['class' => 'form-control','placeholder'=>'','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
@endsection
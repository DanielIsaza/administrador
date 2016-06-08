@extends('admin.main')

@section('title','Editar Docente')

@section('content')

	{!! Form::open(['route' => ['docente.update', $docente->idDocente], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('name','C&eacute;dula') !!}
		{!! Form::text('cedulaDocente',$docente->cedulaDocente,['class' => 'form-control','placeholder'=>'Cedula']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('nombreDocente',$docente->nombreDocente,['class' => 'form-control','placeholder'=>'Nombre','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Correo electr&oacute;nico') !!}
		{!! Form::text('correoElectronico',$docente->correoElectronico,['class' => 'form-control','placeholder'=>'Nombre']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

@endsection
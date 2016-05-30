@extends('admin.main')

@section('title','Crear Docente')

@section('content')
	
	{!! Form::open(['route' => 'docente.store','method' => 'POST']) !!}

	<div class="form-group">
		{!! Form::label('name','Cedula') !!}
		{!! Form::text('cedulaDocente',null,['class' => 'form-control','placeholder'=>'Cedula','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('nombreDocente',null,['class' => 'form-control','placeholder'=>'Nombre','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name','Correo electronico') !!}
		{!! Form::text('correoElectronico',null,['class' => 'form-control','placeholder'=>'Correo','required']) !!}
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
@extends('admin.main')

@section('title','Editar grupo')

@section('content')
	{!! Form::open(['route' => ['grupos.update', $array['grupo']->idGrupo], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name','Profesor') !!}
			{!! Form::select('Docente_idDocente',$array['docentes'],$array['grupo']->Docente_idDocente,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name','Número del grupo') !!}
			{!! Form::text('numero',$array['grupo']->NumeroGrupo,['class' => 'form-control','placeholder'=>'Número del grupo','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection
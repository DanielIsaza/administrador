@extends('admin.main')

@section('title','Reporte por profesor')

@section('content')
	{!! Form::open(['route' => 'reporteProfesor.store','method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('name','Profesor') !!}
			{!! Form::select('idProfesor',$docentes,null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Generar Reporte',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close()!!}
@endsection
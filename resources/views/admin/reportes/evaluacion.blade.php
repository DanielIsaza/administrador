@extends('admin.main')

@section('title','Reporte evaluación de desempeño')

@section('content')
	{!! Form::open(['route' => 'reporteEvaluacion.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
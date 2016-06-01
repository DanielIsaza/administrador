@extends('admin.main')

@section('title','Reportes')

@section('content')
	{!! Form::open(['route' => 'reporteEvaluacion.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
@extends('admin.main')

@section('title','Reporte por profesor')

@section('content')
	{!! Form::open(['route' => 'reporteProfesor.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
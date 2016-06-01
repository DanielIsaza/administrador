@extends('admin.main')

@section('title','Reportes')

@section('content')
	{!! Form::open(['route' => 'reporteProfesor.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
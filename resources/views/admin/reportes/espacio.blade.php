@extends('admin.main')

@section('title','Reporte por espacio académico')

@section('content')
	{!! Form::open(['route' => 'reporteEspacio.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
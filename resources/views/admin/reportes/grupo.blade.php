@extends('admin.main')

@section('title','Reporte por grupo')

@section('content')
	{!! Form::open(['route' => 'reporteEspacio.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
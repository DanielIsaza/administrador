@extends('admin.main')

@section('title','Reporte por periodo académico')

@section('content')
	{!! Form::open(['route' => 'reportePeriodo.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
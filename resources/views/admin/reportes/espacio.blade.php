@extends('admin.main')

@section('title','Reportes')

@section('content')
	{!! Form::open(['route' => 'reporteEspacio.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
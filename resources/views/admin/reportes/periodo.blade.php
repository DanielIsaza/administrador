@extends('admin.main')

@section('title','Reportes')

@section('content')
	{!! Form::open(['route' => 'reportePeriodo.store','method' => 'POST']) !!}
			
	{!! Form::close()!!}
@endsection
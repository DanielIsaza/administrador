@extends('admin.main')

@section('title','Reporte Completo')

@section('content')
	{!! Form::open(['route' => 'reporteCompleto.store','method' => 'POST']) !!}
			{!! Form::submit('Generar Reporte',['class'=>'btn btn-primary']) !!}
	{!! Form::close()!!}
@endsection
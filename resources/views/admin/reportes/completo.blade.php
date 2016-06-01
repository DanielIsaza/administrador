@extends('admin.main')

@section('title','Reportes')

@section('content')
	{!! Form::open(['route' => 'reporteCompleto.store','method' => 'POST']) !!}
			<a href="{{ route('docente.create')}}" class="btn btn-success">Generar Reporte</a> 
	{!! Form::close()!!}
@endsection
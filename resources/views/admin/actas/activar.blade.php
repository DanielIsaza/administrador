@extends('admin.main')

@section('title','Activar un acta')

@section('content')
 	
	{!! Form::open(['route' => 'activar.store','method' => 'POST']) !!}
	 	<div class="form-group">
			{!! Form::label('name','Seleccione una opción') !!}
			{!! Form::select('activar',[1=>"Acta de concertación",2=>"Acta de socialización",3=>"Evaluación de desempeño",4=>"Desactivar todas"],null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection
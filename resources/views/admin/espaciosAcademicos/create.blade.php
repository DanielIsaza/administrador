@extends('admin.main')

@section('title','Crear espacio académico')

@section('content')

<script>
		var espaciosAcademicos = null;
		$(document).ready(function()
		{
			$("select[name=idPlanEstudios]").change(function()
			{
				$.get("{{ url('dropdown')}}",
				{ option: $(this).val() },
				function(data) {
					$("select[name=idSemestre]").empty();
					$("select[name=idSemestre]").append("<option >"+"Seleccione una opción"+"</option>")
					$.each(data, function(key, element) {
						$("select[name=idSemestre]").append("<option value='" + key + "'>" + element + "</option>");
					});
				});
			});
			$("select[name=idSemestre]").change(function()
			{
				$.get("{{ url('lista') }}",
				{ semestre:$(this).val() },
				function(data){
					$("tBody[name=tabla]").empty();
					$.each(data,function(key,element){
						$("tBody[name=tabla]").append(
							"<tr><td>"+ element +'</td><td><a href="/espaciosAcademicos/'+key+'/edit" class="btn btn-warning">'+"<span class='glyphicon glyphicon-edit'>Editar</span></a></td><td><a href='#' onClick='return confirm()' class='btn btn-danger'><span class='glyphicon glyphicon-edit'>Eliminar</span></a></td></tr>");
					});
				});
			});
		});		
	</script>
	{!! Form::open(['route' => 'espaciosAcademicos.store','method' => 'POST']) !!}

		<div class="form-group">
		{!! Form::label('name','Plan de estudios') !!}
		{!! Form::select('idPlanEstudios',$planes,null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('name','Semestre') !!}
		{!! Form::select('idSemestre',[""],null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('nombre',null,['class' => 'form-control','placeholder'=>'Nombre espacio académico','required']) !!}
		</div>

		<div class="form-group">
		{!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection
@extends('admin.main')

@section('title','Lista de espacios académicos')

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
					$.each(data,function(key,element){
						$("tBody[name=tabla]").append("<tr><td>"+ key +"</td><td><a href='{{ route('espaciosAcademicos.edit'," + element + ") }}' class='btn btn-warning'><span class='glyphicon glyphicon-edit'>Editar</span></a></td><td><a href='#' onClick='return confirm()' class='btn btn-danger'><span class='glyphicon glyphicon-edit'>Eliminar</span></a></td></tr>");
					});
				});
			});
		});		
	</script>

	<div class="form-group">

		{!! Form::label('name','Plan de estudios') !!}
		{!! Form::select('idPlanEstudios',$array['planes'],null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}

		{!! Form::label('name','Semestre') !!}
		{!! Form::select('idSemestre',[""],null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
	</div>
		<table class="table table-striped" id="tabla">
			<thead>
				<th>Nombre</th>
				<th>Acci&oacute;n</th>
			</thead>
			<tBody name="tabla">
			</tBody>
		</table>

@endsection
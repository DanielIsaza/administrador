@extends('admin.main')

@section('title','Reporte por espacio académico')

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
				$("select[name=idEspacioAcademico]").empty();
				$("select[name=idEspacioAcademico]").append("<option >"+"Seleccione una opción"+"</option>")
				$.each(data,function(key,element){
					$("select[name=idEspacioAcademico").append("<option value='"+key+"'>"+element+"</option>");
				});
			});
		});
	});
</script>
	{!! Form::open(['route' => 'reporteEspacio.store','method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('name','Plan de estudios') !!}
			{!! Form::select('idPlanEstudios',$planes,null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name','Semestre') !!}
			{!! Form::select('idSemestre',[""],null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('name','Espacio Académico') !!}
			{!! Form::select('idEspacioAcademico',[""],null,['class'=> 'form-control','placeholder'=>'Seleccione una opción','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Generar Reporte',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close()!!}
@endsection
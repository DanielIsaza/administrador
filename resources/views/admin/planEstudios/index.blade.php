@extends('admin.main')

@section('title','Lista de planes de estudio')

@section('content')

<a href="{{ route('planEstudios.create')}}" class="btn btn-success"> Ingresar un plan de estudio</a> <br>
<table class="table table-striped">
		<thead>
			<th>Identificador</th>
			<th>Nombre plan de estudios</th>
			<th>Acci&oacute;n</th>
		</thead>
		<tbody>
			@foreach($planEstudios as $plan)
			<tr>
				<td>{{ $plan->idPlanEstudio }}</td>
				<td>{{ $plan->nombrePlanEstudio }}</td>
				<td><a href="{{ route('planEstudios.edit', $plan->idPlanEstudio) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit">Editar</span> </a> <a href="{{ route('admin.planEstudios.destroy', $plan->idPlanEstudio) }}" onClick="return confirm('¿Seguro papu?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove">Eliminar</span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $planEstudios->render() !!}

@endsection
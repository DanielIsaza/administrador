@extends('admin.main')

@section('title','Lista de periodos academicos')

@section('content')

<a href="{{ route('periodoAcademico.create')}}" class="btn btn-success"> Ingresar un periodo academico</a> <br>
<table class="table table-striped">
		<thead>
			<th>Identificador</th>
			<th>Nombre periodo academico</th>
			<th>Acci&oacute;n</th>
		</thead>
		<tbody>
			@foreach($periodos as $periodo)
			<tr>
				<td>{{ $periodo->id }}</td>
				<td>{{ $periodo->periodo }}</td>
				<td><a href="{{ route('periodoAcademico.edit', $periodo->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit">Editar</span> </a> <a href="{{ route('admin.periodoAcademico.destroy', $periodo->id) }}" onClick="return confirm('¿Seguro?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove">Eliminar</span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{!! $periodos->render() !!}

@endsection
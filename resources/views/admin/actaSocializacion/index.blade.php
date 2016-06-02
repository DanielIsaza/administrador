@extends('admin.main')

@section('title','Acta de socialización')

@section('content')
	<a href="{{ route('actaSocializacion.create')}}" class="btn btn-success">Ingresar pregunta</a> <br>
	<br>
	<table class="table table-striped">
		<thead>
			<th>Enunciado</th>
			<th>Acci&oacute;n</th>
		</thead>
		<tbody>
			@foreach($enunciados as $doc)
				<tr>
					<td>{{ $doc->enunciado }}</td>
					<td><a href="{{ route('actaSocializacion.edit', $doc->numeroPregunta) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit">Editar</span> </a> <a href="{{ route('admin.actaSocializacion.destroy', $doc->numeroPregunta) }}" onClick="return confirm('¿Seguro?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove">Eliminar</span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
@extends('admin.main')

@section('title','Lista de docentes')

@section('content')
	<a href="{{ route('docente.create')}}" class="btn btn-success"> Ingresar un nuevo docente</a> 
		{!! Form::open(['route' => 'docente.index', 'method'=>'GET','class'=>'navbar-form pull-right','aria-describedby'=>'search']) !!}
			<div class="input-group">
				{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'buscar docente']) !!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
			</div>
		{!! Form::close() !!}
	<hr>
	<table class="table table-striped">
		<thead>
			<th>C&eacute;dula</th>
			<th>Nombre</th>
			<th>Correo electr&oacute;nico</th>
			<th>Acci&oacute;n</th>
		</thead>
		<tbody>
			@foreach($docentes as $doc)
			<tr>
				<td>{{ $doc->cedulaDocente }}</td>
				<td>{{ $doc->nombreDocente }}</td>
				<td>{{ $doc->correoElectronico }}</td>
				<td><a href="{{ route('docente.edit', $doc->idDocente) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit">Editar</span> </a> <a href="{{ route('admin.docente.destroy', $doc->idDocente) }}" onClick="return confirm('¿Seguro?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove">Eliminar</span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{!! $docentes->render() !!}
@endsection
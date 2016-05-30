@extends('admin.main')

@section('title','Lista de espacios académicos')

@section('content')

		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Acci&oacute;n</th>
			</thead>
			<tbody>
				@foreach($array['espacios']  as $doc)
					<tr>
						<td>{{ $doc }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

@endsection
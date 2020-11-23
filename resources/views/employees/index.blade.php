@extends('layouts.admin')

@section('title', 'Employee List')
@section('content-header', 'Lista de Empleados')
@section('content-actions')
<a href="{{ route('employees.create') }}" class="btn btn-primary">Alta de Empleados</a>
@endsection
@section('css')

<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card">
	<div class="card-body bg-light text-dark border border-warning rounded">
		<div class="row">
			<div class="col-md-6">
				<a href="{{ route('empleados-pdf') }}" class="btn btn-primary">Empleados PDF</a>
			</div>
			<div class="col-md-6">
				<small class="float-right font-weight-bolder">Fecha: {{ date(' d-M-Y ') }}</small>
			</div>

		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-light"> 
				<tr>
					<th>Id</th>
					<th>Avatar</th>
					<th>Nombre</th>
					<th>Apellido(s)</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Domicilio</th>
					<th>Fecha de Alta</th>
					<th>Fecha Actualiz</th>
					<th>Acción</th>

				</tr>
			</thead>
			<tbody>
				@foreach ($employees as $employee)
				<tr>
					<td>{{ $employee->id }}</td>
					<td>
						<img width="50" src="{{ $employee->getAvatarUrl() }}" alt="">
					</td>
					<td>{{ $employee->first_name }}</td>
					<td>{{ $employee->last_name }}</td>
					<td>{{ $employee->email }}</td>
					<td>{{ $employee->phone }}</td>
					<td>{{ $employee->address }}</td>
					<td>{{ $employee->created_at }}</td>
					<td>{{ $employee->updated_at }}</td>
					<td>
						<a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						
						<button class="btn btn-danger btn-delete" data-url="{{ route('employees.destroy', $employee) }}"><i class="fas fa-trash"></i> </button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>		
		{{ $employees->render() }}
	</div>
</div>

@endsection

@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
	$(document).ready(function () {
		$(document).on('click', '.btn-delete', function() {
			$this = $(this);
			const swalWithBootstrapButtons = Swal.mixin({
			  	customClass: {
			    	confirmButton: 'btn btn-success',
			    	cancelButton: 'btn btn-danger'
			  	},
			  	buttonsStyling: false
			  	})

			  	swalWithBootstrapButtons.fire({
				title: 'Está seguro?',
				text: "¿Realmente quiere eliminar este empleado?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Si, Eliminar!',
				cancelButtonText: 'No',
				reverseButtons: true
				}).then((result) => {
				if (result.value) {
				  	$.post($this.data('url'), {_method: 'DELETE', _token: '{{ csrf_token() }}'}, function (res) {
				  		$this.closest('tr').fadeOut(500, function () {
				  			$(this).remove();
				  		})
				  	})    
				 }
			})
		})
	})
</script>
@endsection
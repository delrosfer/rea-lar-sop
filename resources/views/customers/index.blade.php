@extends('layouts.admin')

@section('title', 'Customer List')
@section('content-header', 'Lista de Clientes')
@section('content-actions')
<a href="{{ route('customers.create') }}" class="btn btn-primary">Crear Clientes</a>
@endsection
@section('css')

<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<a href="{{ route('clientes-pdf') }}" class="btn btn-primary">Clientes PDF</a>
			</div>
			<div class="col-md-6">
				<small class="float-right">Fecha: {{ date(' d-M-Y ') }}</small>
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
					<th>Actions</th>

				</tr>
			</thead>
			<tbody>
				@foreach ($customers as $customer)
				<tr>
					<td>{{ $customer->id }}</td>
					<td>
						<img width="50" src="{{ $customer->getAvatarUrl() }}" alt="">
					</td>
					<td>{{ $customer->first_name }}</td>
					<td>{{ $customer->last_name }}</td>
					<td>{{ $customer->email }}</td>
					<td>{{ $customer->phone }}</td>
					<td>{{ $customer->address }}</td>
					<td>{{ $customer->created_at }}</td>
					<td>{{ $customer->updated_at }}</td>
					<td>
						<a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						
						<button class="btn btn-danger btn-delete" data-url="{{ route('customers.destroy', $customer) }}"><i class="fas fa-trash"></i> </button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>		
		{{ $customers->render() }}
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
				text: "¿Realmente quiere eliminar este cliente?",
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
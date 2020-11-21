@extends('layouts.admin')

@section('title', 'Supplier List')
@section('content-header', 'Lista de Proveedores')
@section('content-actions')
<a href="{{ route('suppliers.create') }}" class="btn btn-primary">Alta Proveedores</a>
@endsection
@section('css')

<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<a href="{{ route('proveedores-pdf') }}" class="btn btn-primary">Proveedores PDF</a>
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
					<th>Fecha Actualización</th>
					<th>Acción</th>

				</tr>
			</thead>
			<tbody>
				@foreach ($suppliers as $supplier)
				<tr>
					<td>{{ $supplier->id }}</td>
					<td>
						<img width="50" src="{{ $supplier->getAvatarUrl() }}" alt="">
					</td>
					<td>{{ $supplier->first_name }}</td>
					<td>{{ $supplier->last_name }}</td>
					<td>{{ $supplier->email }}</td>
					<td>{{ $supplier->phone }}</td>
					<td>{{ $supplier->address }}</td>
					<td>{{ $supplier->created_at }}</td>
					<td>{{ $supplier->updated_at }}</td>
					<td>
						<a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						
						<button class="btn btn-danger btn-delete" data-url="{{ route('suppliers.destroy', $supplier) }}"><i class="fas fa-trash"></i> </button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>		
		{{ $suppliers->render() }}
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
				text: "¿Realmente quiere eliminar este proveedor?",
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
@extends('layouts.admin')

@section('title', 'Product List')
@section('content-header', 'Lista de Productos')
@section('content-actions')
<a href="{{ route('products.create') }}" class="btn btn-primary">Crear Productos</a>
@endsection
@section('css')

<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
					<a href="{{ route('products-pdf') }}" target="_blank" class="btn btn-primary">Inventario PDF</a>
				</div>
			<div class="col-md-6">
				<small class="float-right">Fecha: {{ date(' d-M-Y ') }}</small>
			</div>
		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-light">
				<tr>
					<th>Id</th>
					<th>Producto</th>
					<th>Imagen</th>
					<th>Código de Barras</th>
					<th>Precio</th>
					<th>Inventario</th>
					<th>Estatus</th>
					<th>Created At</th>
					<th>Updated At</th>
					<th>Actions</th>

				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td><img src="{{ Storage::url($product->image) }}" alt="" width="80" height="80"></td>
					<td>{{ $product->barcode }}</td>
					<td>{{ $product->price }}</td>
					<td align="middle">{{ $product->quantity }}</td>
					<td>
						<span class="right badge badge-{{ $product->status ? 'success' : 'danger' }}">{{ $product->status ? 'Activo' : 'Inactivo' }}</span>
					</td>
					<td>{{ $product->created_at }}</td>
					<td>{{ $product->updated_at }}</td>
					<td>
						<a href="{{ route('products.edit', $product) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						
						<button class="btn btn-danger btn-delete" data-url="{{ route('products.destroy', $product) }}"><i class="fas fa-trash"></i> </button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>		
		{{ $products->render() }}
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
				text: "¿Realmente quiere eliminar este producto?",
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
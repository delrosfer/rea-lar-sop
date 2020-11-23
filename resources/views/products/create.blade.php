@extends('layouts.admin')

@section('title', 'Crear Productos')
@section('content-header', 'Crear Productos')

@section('content')

<div class="card">
	<div class="card-body bg-light text-dark border border-warning rounded">
		<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
			@csrf

				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre" value="{{ old('name')}}">
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="description">Descripcion</label>
					<textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="description">{{ old('description') }}</textarea> 
					@error('description')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="image">Imagen</label>
					<div class="custom-file">
						<input type="file" name="image" class="custom-file-input" id="image" accept="image/*">
						<label class="custom-file-label" for="image">Seleccionar Archivo</label>
					</div>
					@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="barcode">Codigo de Barras</label>
					<input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" id="barcode" placeholder="Codigo de Barras" value="{{ old('barcode') }}">
					@error('barcode')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="price">Precio</label>
					<input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Precio" value="{{ old('price') }}">
					@error('precio')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="quantity">Cantidad</label>
					<input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Cantidad" value="{{ old('quantity'), 1 }}">
					@error('quantity')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="status">Estatus</label>
					<select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
						<option value="1" {{ old('status') === 1 ? 'selected' : '' }}>Activo</option>
						<option value="0" {{ old('status') === 0 ? 'selected' : '' }}>Inactivo</option>
					</select> 
					@error('status')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<button class="btn btn-primary" type="submit">Crear</button>
		</form>
	</div>
</div>

@endsection

@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
</script>

@endsection
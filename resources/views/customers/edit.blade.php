@extends('layouts.admin')

@section('title', 'Actualizar Clientes')
@section('content-header', 'Actualizar Clientes')

@section('content')

<div class="card">
	<div class="card-body bg-light text-dark border border-warning rounded">
		<form action="{{ route('customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')

				<div class="form-group">
					<label for="first_name">Nombre</label>
					<input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="Nombre del cliente" value="{{ old('first_name', $customer->first_name)}}">
					@error('first_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="last_name">Apellido(s)</label>
					<input name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Apellido(s)" value="{{ old('last_name', $customer->last_name) }}"></input> 
					@error('last_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="email">Correo Elect.</label>
					<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Correo Electrónico" value="{{ old('email', $customer->email) }}">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="phone">Telefono</label>
					<input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Telefono" minlength="10" maxlength="10" value="{{ old('phone', $customer->phone) }}">
					@error('phone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="address">Domicilio</label>
					<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Domicilio" value="{{ old('address', $customer->address) }}">
					@error('address')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="avatar">Avatar</label>
					<div class="custom-file">
						<input type="file" name="avatar" class="custom-file-input" id="avatar" accept="image/*">
						<label class="custom-file-label" for="avatar">Seleccionar Archivo</label>
					</div>
					@error('avatar')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<button class="btn btn-primary" type="submit">Actualizar</button>
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
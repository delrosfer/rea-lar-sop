@extends('layouts.admin')

@section('title', 'Actualizar Configuracion')
@section('content-header', 'Actualizar Configuración')

@section('content')

	<div class="card">
		<div class="card-body">
			<form action="{{ route('settings.store') }}" method="post">
				@csrf
				
				<div class="form-group">
					<label for="app_name">Nombre del Negocio</label>
					<input type="text" name="app_name" class="form-control @error('app_name') is-invalid @enderror" id="app_name" placeholder="App name" value="{{ old('app_name', config('settings.app_name')) }}">
					@error('app_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="app_description">Giro del Negocio</label>
					<textarea type="text" name="app_description" class="form-control @error('app_description') is-invalid @enderror" id="app_description" placeholder="App description">{{ old('app_description', config('settings.app_description')) }}</textarea>
					@error('app_description')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="form-group">
					<label for="currency_symbol">Simbolo de moneda</label>
					<input type="text" name="currency_symbol" class="form-control @error('currency_symbol') is-invalid @enderror" id="currency_symbol" placeholder="Simbolo de moneda" value="{{ old('currency_symbol', config('settings.currency_symbol')) }}">
					@error('app_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">Cambiar Configuración </button>


			</form>
		</div>
	</div>

@endsection
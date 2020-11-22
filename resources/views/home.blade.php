@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header text-danger bg-gradient-info font-weight-bolder">{{ __('Inicio') }}</div>

                <div class="card-body bg-light text-dark border border-warning rounded-pill font-weight-bolder">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido al Punto de Venta: ') }}{{ config('app.name') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

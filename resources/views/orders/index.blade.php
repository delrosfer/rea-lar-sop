@extends('layouts.admin')

@section('title', 'Lista de Ordenes')
@section('content-header', 'Listado de Ordenes')
@section('content-actions')
<a href="{{ route('cart.index') }}" class="btn btn-primary">Abrir POS</a>
@endsection

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-5">
				<div class="col-md-5">
					<a href="{{ route('ordenes-pdf') }}" class="btn btn-primary">Ordenes PDF</a>
				</div>
			</div>
			<div class="col-md-7">
				<form action="{{route('ordenes-pdf')}}" method="get">
					<div class="row">
						<div class="col-md-5">
							<input type="date" name="start_date" class="form-control" value="{{ request('start_date')}}">
						</div>
						<div class="col-md-5">
							<input type="date" name="end_date" class="form-control" value="{{ request('end_date')}}">
						</div>
						<div class="col-md-2">
							<button class="btn btn-outline-primary">Consultar</button>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-light">
				<tr>
					<th>Id</th>
					<th>Cliente</th>					
					<th>Total Venta</th>
					<th>Cantidad Recibida</th>
					<th>Estado</th>
					<th>Cantidad por pagar</th>
					<th>Fecha Pedido</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->getCustomerName() }}</td>
					<td align="middle">{{ config('settings.currency_symbol')}} {{ $order->formattedTotal() }}</td>
					<td align="middle">{{ config('settings.currency_symbol')}} {{ $order->formattedReceivedAmount() }}</td>
					<td>
						@if($order->receivedAmount() == 0)
							<span class="badge badge-danger">No pago</span>
							@elseif($order->receivedAmount() < $order->total())
							<span class="badge badge-warning">Pago Parcial</span>
							@elseif($order->receivedAmount() == $order->total())
							<span class="badge badge-success">Pagado</span>
							@elseif($order->receivedAmount() > $order->total())
							<span class="badge badge-info">Dar Cambio</span>
						@endif
					</td>
					<td align="rifht">{{ config('settings.currency_symbol')}} {{number_format( $order->total() - $order->receivedAmount(), 2) }}</td>
					<td>{{ $order->created_at }}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th></th>
					<th></th>					
					<th align="middle">{{ config('settings.currency_symbol')}} {{ number_format($total, 2) }}</th>
					<th align="right">{{ config('settings.currency_symbol')}} {{ number_format($receivedAmount, 2) }}</th>
					<th></th>
					<th>{{ config('settings.currency_symbol')}} {{ number_format($total-$receivedAmount, 2) }}</th>
					<th></th>
				</tr>
			</tfoot>
		</table>		
		{{ $orders->render() }}
	</div>
</div>

@endsection
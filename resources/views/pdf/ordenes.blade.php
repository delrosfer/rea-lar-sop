<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lista de Pedidos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<header>
		<p><strong>Punto de Venta PlusSilver</strong> </p>
	</header>
	<div class="container">
		<h4 style="text-align: center">Lista de pedidos</h4>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Cliente</th>					
					<th>Total Venta</th>
					<th>Cantidad Recibida</th>
					<th>Estado</th>
					<th>Cantidad por pagar</th>
					<th>Fecha</th>
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
					<td align="middle">{{ config('settings.currency_symbol')}} {{number_format( $order->total() - $order->receivedAmount(), 2) }}</td>
					<td>{{ $order->created_at }}</td>
				</tr>
				@endforeach
			</tbody>
	</table>	
	</div>
	<footer><strong>Regalame un like, suscribete al canal y comparte el video con tus amigos</strong> </footer>
</body>
</html>
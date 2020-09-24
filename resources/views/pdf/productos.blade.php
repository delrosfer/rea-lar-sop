<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
	<title>Inventario de productos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<header>
		<p><strong>Punto de Venta PlusSilver</strong> </p>
	</header>
	<div class="container">
		<h4 style="text-align: center">Inventario de Productos</h4>
		<small class="float-right">Fecha: {{ date(' d-M-Y ') }}</small>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Producto</th>
					<th>Codigo de Barras</th>
					<th>Precio</th>
					<th>Inventario</th>
					<th>Inventario Físico</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($productos as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->barcode}}</td>
					<td>{{$product->price}}</td>
					<td align="middle">{{$product->quantity}}</td>
					<td>____________________</td>
				</tr>
				@endforeach
			</tbody>
	</table>	
	</div>
	<footer><strong>Regalame un like, suscribete al canal y comparte el video con tus amigos</strong> </footer>
</body>
</html>
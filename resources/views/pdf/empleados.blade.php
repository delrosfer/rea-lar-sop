<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lista de Empleados</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<header>
		<p><strong>Punto de Venta PlusSilver</strong> </p>
	</header>
	<div class="container">
		<h4 style="text-align: center">Lista de empleados</h4>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Domicilio</th>
					<th>Fecha alta</th>
					<th>Fecha Actualiz</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($employees as $employee)
				<tr>
					<td>{{ $employee->id }}</td>
					<td>{{ $employee->first_name }}</td>
					<td>{{ $employee->last_name }}</td>
					<td>{{ $employee->email }}</td>
					<td>{{ $employee->phone }}</td>
					<td>{{ $employee->address }}</td>
					<td>{{ $employee->created_at }}</td>
					<td>{{ $employee->updated_at }}</td>
				</tr>
				@endforeach
			</tbody>
	</table>	
	</div>
	<footer><strong>Regalame un like, suscribete al canal y comparte el video con tus amigos</strong> </footer>
</body>
</html>
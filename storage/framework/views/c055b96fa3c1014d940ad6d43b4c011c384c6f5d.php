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
		<small class="float-right">Fecha: <?php echo e(date(' d-M-Y ')); ?></small>
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
				<?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($product->id); ?></td>
					<td><?php echo e($product->name); ?></td>
					<td><?php echo e($product->barcode); ?></td>
					<td><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($product->price); ?></td>
					<td align="middle"><?php echo e($product->quantity); ?></td>
					<td>____________________</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
	</table>	
	</div>
	<footer><strong>Regalame un like, suscribete al canal y comparte el video con tus amigos</strong> </footer>
</body>
</html><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/pdf/productos.blade.php ENDPATH**/ ?>
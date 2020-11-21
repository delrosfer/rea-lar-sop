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
				<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($order->id); ?></td>
					<td><?php echo e($order->getCustomerName()); ?></td>
					<td align="middle"><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($order->formattedTotal()); ?></td>
					<td align="middle"><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($order->formattedReceivedAmount()); ?></td>
					<td>
						<?php if($order->receivedAmount() == 0): ?>
							<span class="badge badge-danger">No pago</span>
							<?php elseif($order->receivedAmount() < $order->total()): ?>
							<span class="badge badge-warning">Pago Parcial</span>
							<?php elseif($order->receivedAmount() == $order->total()): ?>
							<span class="badge badge-success">Pagado</span>
							<?php elseif($order->receivedAmount() > $order->total()): ?>
							<span class="badge badge-info">Dar Cambio</span>
						<?php endif; ?>
					</td>
					<td align="middle"><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format( $order->total() - $order->receivedAmount(), 2)); ?></td>
					<td><?php echo e($order->created_at); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
	</table>	
	</div>
	<footer><strong>Regalame un like, suscribete al canal y comparte el video con tus amigos</strong> </footer>
</body>
</html><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/pdf/ordenes.blade.php ENDPATH**/ ?>
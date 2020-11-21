<?php $__env->startSection('title', 'Lista de Ordenes'); ?>
<?php $__env->startSection('content-header', 'Listado de Ordenes'); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('cart.index')); ?>" class="btn btn-primary">Abrir POS</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-5">
				<div class="col-md-5">
					<a href="<?php echo e(route('ordenes-pdf')); ?>" class="btn btn-primary">Ordenes PDF</a>
				</div>
			</div>
			<div class="col-md-7">
				<form action="<?php echo e(route('ordenes-pdf')); ?>" method="get">
					<div class="row">
						<div class="col-md-5">
							<input type="date" name="start_date" class="form-control" value="<?php echo e(request('start_date')); ?>">
						</div>
						<div class="col-md-5">
							<input type="date" name="end_date" class="form-control" value="<?php echo e(request('end_date')); ?>">
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
					<td align="rifht"><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format( $order->total() - $order->receivedAmount(), 2)); ?></td>
					<td><?php echo e($order->created_at); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
			<tfoot>
				<tr>
					<th></th>
					<th></th>					
					<th align="middle"><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($total, 2)); ?></th>
					<th align="right"><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($receivedAmount, 2)); ?></th>
					<th></th>
					<th><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($total-$receivedAmount, 2)); ?></th>
					<th></th>
				</tr>
			</tfoot>
		</table>		
		<?php echo e($orders->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/orders/index.blade.php ENDPATH**/ ?>
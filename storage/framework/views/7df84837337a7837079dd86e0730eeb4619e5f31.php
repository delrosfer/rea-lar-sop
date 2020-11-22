<?php $__env->startSection('title', 'Product List'); ?>
<?php $__env->startSection('content-header', 'Lista de Productos'); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Crear Productos</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
	<div class="card-body bg-light text-dark border border-warning rounded">
		<div class="row">
			<div class="col-md-6">
					<a href="<?php echo e(route('products-pdf')); ?>" target="_blank" class="btn btn-primary">Inventario PDF</a>
			</div>
			<div class="col-md-6">
				<small class="float-right font-weight-bolder">Fecha: <?php echo e(date(' d-M-Y ')); ?></small>
			</div>
		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-light">
				<tr>
					<th>Id</th>
					<th>Producto</th>
					<th>Imagen</th>
					<th>Código de Barras</th>
					<th>Precio</th>
					<th>Inventario</th>
					<th>Estatus</th>
					<th>Fecha Alta</th>
					<th>Fecha Actualización</th>
					<th>Acción</th>

				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($product->id); ?></td>
					<td><?php echo e($product->name); ?></td>
					<td><img src="<?php echo e(Storage::url($product->image)); ?>" alt="" width="80" height="80"></td>
					<td><?php echo e($product->barcode); ?></td>
					<td><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($product->price); ?></td>
					<td align="middle"><?php echo e($product->quantity); ?></td>
					<td>
						<span class="right badge badge-<?php echo e($product->status ? 'success' : 'danger'); ?>"><?php echo e($product->status ? 'Activo' : 'Inactivo'); ?></span>
					</td>
					<td><?php echo e($product->created_at); ?></td>
					<td><?php echo e($product->updated_at); ?></td>
					<td>
						<a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						
						<button class="btn btn-danger btn-delete" data-url="<?php echo e(route('products.destroy', $product)); ?>"><i class="fas fa-trash"></i> </button>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>		
		<?php echo e($products->render()); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script>
	$(document).ready(function () {
		$(document).on('click', '.btn-delete', function() {
			$this = $(this);
			const swalWithBootstrapButtons = Swal.mixin({
			  	customClass: {
			    	confirmButton: 'btn btn-success',
			    	cancelButton: 'btn btn-danger'
			  	},
			  	buttonsStyling: false
			  	})

			  	swalWithBootstrapButtons.fire({
				title: 'Está seguro?',
				text: "¿Realmente quiere eliminar este producto?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Si, Eliminar!',
				cancelButtonText: 'No',
				reverseButtons: true
				}).then((result) => {
				if (result.value) {
				  	$.post($this.data('url'), {_method: 'DELETE', _token: '<?php echo e(csrf_token()); ?>'}, function (res) {
				  		$this.closest('tr').fadeOut(500, function () {
				  			$(this).remove();
				  		})
				  	})    
				 }
			})
		})
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/products/index.blade.php ENDPATH**/ ?>
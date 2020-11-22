<?php $__env->startSection('title', 'Customer List'); ?>
<?php $__env->startSection('content-header', 'Lista de Clientes'); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary">Crear Clientes</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
	<div class="card-body bg-light text-dark border border-warning rounded">
		<div class="row">
			<div class="col-md-6">
				<a href="<?php echo e(route('clientes-pdf')); ?>" class="btn btn-primary">Clientes PDF</a>
			</div>
			<div class="col-md-6">
				<small class="float-right font-weight-bolder">Fecha: <?php echo e(date(' d-M-Y ')); ?></small>
			</div>

		</div>
		<table class="table table-striped table-bordered table-hover">
			<thead class="thead-light"> 
				<tr>
					<th>Id</th>
					<th>Avatar</th>
					<th>Nombre</th>
					<th>Apellido(s)</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Domicilio</th>
					<th>Fecha de Alta</th>
					<th>Fecha Actualiz</th>
					<th>Acción</th>

				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($customer->id); ?></td>
					<td>
						<img width="50" src="<?php echo e($customer->getAvatarUrl()); ?>" alt="">
					</td>
					<td><?php echo e($customer->first_name); ?></td>
					<td><?php echo e($customer->last_name); ?></td>
					<td><?php echo e($customer->email); ?></td>
					<td><?php echo e($customer->phone); ?></td>
					<td><?php echo e($customer->address); ?></td>
					<td><?php echo e($customer->created_at); ?></td>
					<td><?php echo e($customer->updated_at); ?></td>
					<td>
						<a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						
						<button class="btn btn-danger btn-delete" data-url="<?php echo e(route('customers.destroy', $customer)); ?>"><i class="fas fa-trash"></i> </button>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>		
		<?php echo e($customers->render()); ?>

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
				text: "¿Realmente quiere eliminar este cliente?",
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/customers/index.blade.php ENDPATH**/ ?>
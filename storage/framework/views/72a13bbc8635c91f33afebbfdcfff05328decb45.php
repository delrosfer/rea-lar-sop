<?php $__env->startSection('title', 'Employee List'); ?>
<?php $__env->startSection('content-header', 'Lista de Empleados'); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary">Alta de Empleados</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
	<div class="card-body bg-light text-dark border border-warning rounded">
		<div class="row">
			<div class="col-md-6">
				<a href="<?php echo e(route('empleados-pdf')); ?>" class="btn btn-primary">Empleados PDF</a>
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
				<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($employee->id); ?></td>
					<td>
						<img width="50" src="<?php echo e($employee->getAvatarUrl()); ?>" alt="">
					</td>
					<td><?php echo e($employee->first_name); ?></td>
					<td><?php echo e($employee->last_name); ?></td>
					<td><?php echo e($employee->email); ?></td>
					<td><?php echo e($employee->phone); ?></td>
					<td><?php echo e($employee->address); ?></td>
					<td><?php echo e($employee->created_at); ?></td>
					<td><?php echo e($employee->updated_at); ?></td>
					<td>
						<a href="<?php echo e(route('employees.edit', $employee)); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						
						<button class="btn btn-danger btn-delete" data-url="<?php echo e(route('employees.destroy', $employee)); ?>"><i class="fas fa-trash"></i> </button>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>		
		<?php echo e($employees->render()); ?>

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
				text: "¿Realmente quiere eliminar este empleado?",
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/employees/index.blade.php ENDPATH**/ ?>
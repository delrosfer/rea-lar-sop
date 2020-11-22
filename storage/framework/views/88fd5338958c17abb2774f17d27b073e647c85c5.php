<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header text-danger bg-gradient-info font-weight-bolder"><?php echo e(__('Inicio')); ?></div>

                <div class="card-body bg-light text-dark border border-warning rounded-pill font-weight-bolder">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('Bienvenido al Punto de Venta: ')); ?><?php echo e(config('app.name')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/home.blade.php ENDPATH**/ ?>
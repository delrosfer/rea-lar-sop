<?php $__env->startSection('css'); ?>

<style type="text/css">
    .invalid-feedback {
        display: block;
    }

</style>

<?php $__env->startSection('content'); ?>

<p class="login-box-msg">Registrese para iniciar sesión</p>
    <form action="<?php echo e(route('login')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <div class="input-group">
                <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Correo Electrónico" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            
        <div class="input-group">
         <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Contraseña" name="password" required autocomplete="current-password">
         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-lock"></span>
           </div>
         </div>
       </div>
       <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="row">
         <div class="col-8">
           <div class="icheck-primary">
             <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
             <label for="remember">
               Recuérdame
             </label>
           </div>
         </div>
         <!-- /.col -->
         <div class="col-4">
           <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
         </div>
         <!-- /.col -->
       </div>
    </form>
<p class="mb-1">
    <a href="<?php echo e(route('password.request')); ?>">Olvidé mi contraseña</a>
</p>
<p class="mb-0">
    <a href="<?php echo e(route('register')); ?>" class="text-center">Registrar una nueva membresia</a>
</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/auth/login.blade.php ENDPATH**/ ?>
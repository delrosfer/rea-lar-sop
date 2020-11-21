<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- overlayScrollbars 
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?php echo $__env->yieldContent('css'); ?>
  <script>
    window.APP = <?php echo json_encode([
      'currency_symbol' => config('settings.currency_symbol')
    ]) ?>
  </script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
	<?php echo $__env->make('layouts.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
	<?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $__env->yieldContent('content-header'); ?></h1>
          </div>
          <div class="col-sm-6 text-right">
            <?php echo $__env->yieldContent('content-actions'); ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php echo $__env->make('layouts.partials.alert.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('layouts.partials.alert.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
    </section>

  </div>
  <!-- /.content-wrapper -->
     <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/layouts/admin.blade.php ENDPATH**/ ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo e(asset('images/Logo plusSilver.png')); ?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo e(config('app.name')); ?> </span>
    </a>
<!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(auth()->user()->getAvatar()); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(auth()->user()->getFullname()); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li><li class="nav-item has-treeview">
            <a href="<?php echo e(route('cart.index')); ?>" class="nav-link <?php echo e(activeSegment('cart')); ?>">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Punto de Venta
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo e(route('orders.index')); ?>" class="nav-link <?php echo e(activeSegment('orders')); ?>">
              <i class="nav-icon fab fa-sellsy"></i>
              <p>
                Pedidos (Ventas)
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo e(route('products.index')); ?>" class="nav-link <?php echo e(activeSegment('products')); ?>">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo e(route('customers.index')); ?>" class="nav-link <?php echo e(activeSegment('customers')); ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo e(route('suppliers.index')); ?>" class="nav-link <?php echo e(activeSegment('suppliers')); ?>">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Proveedores
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="<?php echo e(route('settings.index')); ?>" class="nav-link <?php echo e(activeSegment('settings')); ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configuración
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Salir
              </p>
              <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form">
                <?php echo csrf_field(); ?>
              </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH /home/silver/Documentos/Laravel/rea-lar-sop/resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>
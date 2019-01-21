<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles (bootstrap4.1.3)-->
    

    <!-- Bootstrap core CSS-->
    <link href="<?php echo e(asset('startbootstrap-sb-admin/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('startbootstrap-sb-admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo e(asset('startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('startbootstrap-sb-admin/css/sb-admin.css')); ?>" rel="stylesheet">
</head>
<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand mr-1" href="<?php echo e(url('/')); ?>"><?php echo e(config('app.name', 'Laravel')); ?></a>
        
        <ul class="navbar-nav ml-auto">
        </ul>

        <!-- Navbar link : profile, logout, -->
        <ul class="navbar-nav mr-auto mr-md-0">
          <!-- Authentication Links -->
          <?php if(auth()->guard()->guest()): ?>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
              </li>
              <?php if(Route::has('register')): ?>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                  </li>
              <?php endif; ?>
          <?php else: ?>
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/home">Dashboard</a>
                      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <?php echo e(__('Logout')); ?>

                      </a>

                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>
                  </div>
              </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <div id="wrapper">
      
      
      <div id="content-wrapper">

        <div class="container">
          <!-- Page Content -->
          <?php echo $__env->yieldContent('content'); ?>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Default UNJ 2019</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('startbootstrap-sb-admin/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('startbootstrap-sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('startbootstrap-sb-admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Page level plugin JavaScript-->
    
    <script src="<?php echo e(asset('startbootstrap-sb-admin/vendor/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('startbootstrap-sb-admin/js/sb-admin.min.js')); ?>"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo e(asset('startbootstrap-sb-admin/js/demo/datatables-demo.js')); ?>"></script>
    

</body>
</html>

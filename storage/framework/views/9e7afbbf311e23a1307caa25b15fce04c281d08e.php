<?php $__env->startSection('content'); ?>
<div>
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-center"><h3>Halaman Home</h3></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_welcome', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
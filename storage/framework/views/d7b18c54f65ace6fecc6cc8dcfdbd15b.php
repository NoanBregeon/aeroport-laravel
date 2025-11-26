

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- CARD -->
    <div class="bg-gray-800 shadow rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold mb-2">Terminaux</h3>
        <p class="text-4xl font-bold"><?php echo e($terminalsCount); ?></p>
    </div>

    <div class="bg-gray-800 shadow rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold mb-2">Halls</h3>
        <p class="text-4xl font-bold"><?php echo e($hallsCount); ?></p>
    </div>

    <div class="bg-gray-800 shadow rounded-lg p-6 border border-gray-700">
        <h3 class="text-lg font-semibold mb-2">Gates</h3>
        <p class="text-4xl font-bold"><?php echo e($gatesCount); ?></p>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\code\aeroport-laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
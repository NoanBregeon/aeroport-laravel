

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-8">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Carte Terminaux -->
    <div class="p-6 bg-white shadow rounded-lg border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-600">Terminaux</h2>
        <p class="text-4xl font-bold text-blue-600 mt-3"><?php echo e($stats['terminaux']); ?></p>
    </div>

    <!-- Carte Halls -->
    <div class="p-6 bg-white shadow rounded-lg border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-600">Halls</h2>
        <p class="text-4xl font-bold text-green-600 mt-3"><?php echo e($stats['halls']); ?></p>
    </div>

    <!-- Carte Gates -->
    <div class="p-6 bg-white shadow rounded-lg border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-600">Gates</h2>
        <p class="text-4xl font-bold text-purple-600 mt-3"><?php echo e($stats['gates']); ?></p>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\code\aeroport-laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
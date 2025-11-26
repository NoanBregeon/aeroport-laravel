

<?php $__env->startSection('content'); ?>
<h1 class="text-2xl font-bold mb-6">Panel Opérateur</h1>

<?php $__currentLoopData = $terminals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $terminal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="bg-white p-5 rounded-lg shadow mb-6">
        <h2 class="text-xl font-semibold"><?php echo e($terminal->nom); ?></h2>
        <p class="text-gray-600">Emplacement : <?php echo e($terminal->emplacement); ?></p>

        <?php $__currentLoopData = $terminal->halls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mt-4 p-4 border rounded">
                <h3 class="font-bold">Hall : <?php echo e($hall->nom); ?></h3>

                <!-- Modification min personnel -->
                <form method="POST"
                      action="<?php echo e(route('operator.halls.personnel', $hall)); ?>"
                      class="flex items-center gap-2 mt-2">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <input type="number" name="min_personnel" class="border p-1 rounded"
                           value="<?php echo e($hall->min_personnel); ?>">

                    <button class="px-3 py-1 bg-blue-600 text-white rounded">
                        Modifier
                    </button>
                </form>

                <!-- Gates -->
                <?php $__currentLoopData = $hall->gates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mt-3 p-3 border rounded flex justify-between items-center">
                        <span>Porte : <strong><?php echo e($gate->nom); ?></strong></span>
                        <span>Capacité : <?php echo e($gate->capacite_max); ?></span>

                        <form method="POST"
                              action="<?php echo e(route('operator.gates.toggle', $gate)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>

                            <button class="px-3 py-1
                                <?php echo e($gate->is_open ? 'bg-red-600' : 'bg-green-600'); ?>

                                text-white rounded">
                                <?php echo e($gate->is_open ? 'Fermer' : 'Ouvrir'); ?>

                            </button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.operator', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\code\aeroport-laravel\resources\views/operator/dashboard.blade.php ENDPATH**/ ?>
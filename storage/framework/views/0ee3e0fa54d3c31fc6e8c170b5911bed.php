

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Gates</h1>

    <a href="<?php echo e(route('admin.gates.create')); ?>"
       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        + Ajouter un Gate
    </a>
</div>

<?php if(session('success')): ?>
    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<table class="w-full border bg-white rounded shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3 text-left">Numéro</th>
            <th class="p-3 text-left">Hall</th>
            <th class="p-3 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $gates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-t">
                <td class="p-3"><?php echo e($gate->numero); ?></td>
                <td class="p-3"><?php echo e($gate->hall->nom ?? 'N/A'); ?></td>
                <td class="p-3 text-center flex gap-2 justify-center">
                    <a href="<?php echo e(route('admin.gates.edit', $gate)); ?>"
                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Modifier
                    </a>

                    <form action="<?php echo e(route('admin.gates.destroy', $gate)); ?>" method="POST"
                          onsubmit="return confirm('Supprimer ce gate ?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="mt-4">
    <?php echo e($gates->links()); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\code\aeroport-laravel\resources\views/admin/gates/index.blade.php ENDPATH**/ ?>
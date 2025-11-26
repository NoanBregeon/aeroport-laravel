<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl">Gestion des Halls</h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <?php if(session('success')): ?>
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="mb-4">
                <a href="<?php echo e(route('admin.halls.create')); ?>"
                   class="px-4 py-2 bg-blue-600 text-white rounded">
                    + Ajouter un Hall
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow p-6 rounded">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 text-left">ID</th>
                            <th class="py-2">Nom</th>
                            <th class="py-2">Type</th>
                            <th class="py-2">Terminal</th>
                            <th class="py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $halls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b">
                                <td class="py-2"><?php echo e($hall->id); ?></td>
                                <td><?php echo e($hall->nom); ?></td>
                                <td><?php echo e($hall->type ?? '—'); ?></td>
                                <td><?php echo e($hall->terminal->nom); ?></td>

                                <td class="py-2 flex gap-2">
                                    <a href="<?php echo e(route('admin.halls.edit', $hall)); ?>"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded">
                                        Modifier
                                    </a>

                                    <form method="POST"
                                          action="<?php echo e(route('admin.halls.destroy', $hall)); ?>"
                                          onsubmit="return confirm('Supprimer ce hall ?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="px-3 py-1 bg-red-600 text-white rounded">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-500">
                                    Aucun hall enregistré.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\code\aeroport-laravel\resources\views/admin/halls/index.blade.php ENDPATH**/ ?>
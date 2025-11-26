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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Ajouter un Terminal
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                <form action="<?php echo e(route('admin.terminals.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="mb-4">
                        <label class="block font-medium">Nom</label>
                        <input type="text" name="nom"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Code</label>
                        <input type="text" name="code"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Emplacement</label>
                        <input type="text" name="emplacement"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Date mise en service</label>
                        <input type="date" name="date_mise_en_service"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700">
                    </div>

                    <div class="flex justify-between">
                        <a href="<?php echo e(route('admin.terminals.index')); ?>"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Retour
                        </a>

                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Enregistrer
                        </button>
                    </div>

                </form>

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
<?php /**PATH C:\code\aeroport-laravel\resources\views/admin/terminals/create.blade.php ENDPATH**/ ?>
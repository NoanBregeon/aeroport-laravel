<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Opérateur</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="bg-gray-100 min-h-screen">

<div class="flex">

    <aside class="w-64 bg-blue-900 text-white p-4 min-h-screen">
        <h1 class="text-xl font-bold mb-6">Opérateur</h1>

        <nav class="space-y-2">
            <a href="<?php echo e(route('operator.dashboard')); ?>"
               class="block px-3 py-2 rounded hover:bg-blue-700">
                Dashboard
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</div>

</body>
</html>
<?php /**PATH C:\code\aeroport-laravel\resources\views/layouts/operator.blade.php ENDPATH**/ ?>
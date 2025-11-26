<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white min-h-screen p-4 flex flex-col">

        <h2 class="text-xl font-bold mb-8">Admin</h2>

        <nav class="space-y-2 flex-1">

            
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="block px-3 py-2 rounded transition
               <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-800' : 'hover:bg-gray-700'); ?>">
                Dashboard
            </a>

            
            <a href="<?php echo e(route('admin.terminals.index')); ?>"
               class="block px-3 py-2 rounded transition
               <?php echo e(request()->routeIs('admin.terminals.*') ? 'bg-gray-800' : 'hover:bg-gray-700'); ?>">
                Terminaux
            </a>

            
            <a href="<?php echo e(route('admin.halls.index')); ?>"
               class="block px-3 py-2 rounded transition
               <?php echo e(request()->routeIs('admin.halls.*') ? 'bg-gray-800' : 'hover:bg-gray-700'); ?>">
                Halls
            </a>

            
            <a href="<?php echo e(route('admin.gates.index')); ?>"
               class="block px-3 py-2 rounded transition
               <?php echo e(request()->routeIs('admin.gates.*') ? 'bg-gray-800' : 'hover:bg-gray-700'); ?>">
                Gates
            </a>

        </nav>

        <!-- Footer / logout -->
        <div class="mt-6 border-t border-gray-700 pt-4">
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button class="w-full text-left px-3 py-2 rounded hover:bg-red-600 transition">
                    Déconnexion
                </button>
            </form>
        </div>

    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-8">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html>
<?php /**PATH C:\code\aeroport-laravel\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel - Aéroport</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-900 text-gray-100 h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col">

        <div class="p-6 text-2xl font-bold tracking-wide border-b border-gray-700">
            ✈️ Admin Panel
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="flex items-center px-3 py-2 rounded-lg 
                      hover:bg-gray-700 transition 
                      <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-700 font-semibold' : ''); ?>">
                📊 Dashboard
            </a>

            <a href="<?php echo e(route('admin.terminals.index')); ?>"
               class="flex items-center px-3 py-2 rounded-lg 
                      hover:bg-gray-700 transition
                      <?php echo e(request()->routeIs('admin.terminals.*') ? 'bg-gray-700 font-semibold' : ''); ?>">
                🏢 Terminaux
            </a>

            <a href="<?php echo e(route('admin.halls.index')); ?>"
               class="flex items-center px-3 py-2 rounded-lg 
                      hover:bg-gray-700 transition
                      <?php echo e(request()->routeIs('admin.halls.*') ? 'bg-gray-700 font-semibold' : ''); ?>">
                🛫 Halls
            </a>

            <a href="<?php echo e(route('admin.gates.index')); ?>"
               class="flex items-center px-3 py-2 rounded-lg 
                      hover:bg-gray-700 transition
                      <?php echo e(request()->routeIs('admin.gates.*') ? 'bg-gray-700 font-semibold' : ''); ?>">
                🚪 Gates
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">

            <div class="text-sm mb-1">Connecté :</div>
            <div class="font-semibold mb-3"><?php echo e(auth()->user()->name); ?></div>

            <a href="<?php echo e(route('profile.edit')); ?>"
               class="block mb-3 px-3 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 text-sm">
                ⚙️ Paramètres du compte
            </a>

            <div class="flex gap-3 text-xs mb-3">
                <form method="POST" action="<?php echo e(route('lang.switch')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="locale" value="fr">
                    <button class="hover:underline">🇫🇷 FR</button>
                </form>

                <form method="POST" action="<?php echo e(route('lang.switch')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="locale" value="en">
                    <button class="hover:underline">🇬🇧 EN</button>
                </form>
            </div>

            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="w-full text-left px-3 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-sm">
                    🔓 Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col">

        <!-- HEADER -->
        <header class="h-16 border-b border-gray-700 flex items-center px-6 bg-gray-850">
            <h1 class="text-xl font-semibold">
                <?php echo $__env->yieldContent('title'); ?>
            </h1>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

    </div>

</body>
</html>
<?php /**PATH C:\code\aeroport-laravel\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
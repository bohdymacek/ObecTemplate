


<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <p class="pl-10 text-xl flex items-center">
                <i class="fas fa-list mr-3"></i> Statistiky
            </p>
            <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-6">

                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                    <div class="px-10 py-6">
                        <div class="font-bold text-xl mb-2 text-center">Kategorie</div>
                        <p class="text-gray-700 text-5xl text-center">
                            <?php echo e($categories); ?>

                        </p>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                    <div class="px-10 py-6">
                        <div class="font-bold text-xl mb-2 text-center">Aktuality</div>
                        <p class="text-gray-700 text-5xl text-center">
                            <?php echo e($posts); ?>

                        </p>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                    <div class="px-10 py-6">
                        <div class="font-bold text-xl mb-2 text-center">Tagy</div>
                        <p class="text-gray-700 text-5xl text-center">
                            <?php echo e($tags); ?>

                        </p>
                    </div>
                </div>

                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white ">
                    <div class="px-10 py-6">
                        <div class="font-bold text-xl mb-2 text-center">Uživatelé</div>
                        <p class="text-gray-700 text-5xl text-center">
                            <?php echo e($users); ?>

                        </p>
                    </div>
                </div>


            </div>
        </main>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>


<?php /**PATH C:\Users\bohda\OneDrive\Plocha\Obec\resources\views/admin/index.blade.php ENDPATH**/ ?>
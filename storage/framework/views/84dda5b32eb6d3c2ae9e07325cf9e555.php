<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="container mx-auto p-6">
        <div class="bg-white shadow rounded-lg p-8">
            <div class="flex flex-col items-center">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-only')): ?>
                    <h1 class="text-3xl font-bold mb-4">Vítejte, administrátore webu!</h1>
                    <div class="mb-6">
                        <img src="<?php echo e(asset('import/assets/d0c60459431b6ffaecf92fc902ca996d.gif')); ?>" alt="Vítací obrázek super administrátora" class="w-56 h-auto mx-auto rounded-full">
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mt-2 text-sm text-gray-600">
                            Máte plný přístup ke všem funkcím systému včetně uživatelských účtů.
                        </p>
                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('admin.index'),'class' => 'bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.index')),'class' => 'bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-300']); ?>
                            Admin Panel
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                    </div>
                
                <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin-login')): ?>
                    <h1 class="text-3xl font-bold mb-4">Vítejte, správče webu!</h1>
                    <div class="mb-6">
                        <img src="<?php echo e(asset('import/assets/b6a164fe3c74eeb8fae8de7ad4b1d3ef.gif')); ?>" alt="Vítací obrázek administrátora" class="w-56 h-auto mx-auto rounded-full">
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mt-2 text-sm text-gray-600">
                            Klikněte na tento odkaz pro přechod do hlavního kontrolního panelu, kde můžete spravovat nastavení a obsah webu.
                        </p>
                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('admin.index'),'class' => 'bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.index')),'class' => 'bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300']); ?>
                            Kontrolní Panel
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                    </div>
                
                <?php else: ?>
                    <h1 class="text-3xl font-bold mb-4">Vítejte na našem webu, občane!</h1>
                    <div class="mb-6">
                        <img src="<?php echo e(asset('import/assets/b597a948096733.588edd574ae05.gif')); ?>" alt="Vítací obrázek pro návštěvníky" class="w-56 h-auto mx-auto rounded-full">
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mt-2 text-sm text-gray-600">
                            Pro pokračování do webu klikněte zde:
                        </p>
                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('front.main'),'class' => 'bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('front.main')),'class' => 'bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300']); ?>
                            Zpět na hlavní stránku
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\Users\bohda\OneDrive\Plocha\Obec\resources\views/dashboard.blade.php ENDPATH**/ ?>
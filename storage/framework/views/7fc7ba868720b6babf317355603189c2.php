<?php if (isset($component)) { $__componentOriginal8995a876bdf490faf24c1d189b006974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8995a876bdf490faf24c1d189b006974 = $attributes; } ?>
<?php $component = App\View\Components\BlogLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blog-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BlogLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Úvodní sekce -->
    <div class="container mx-auto flex flex-wrap py-6">

    <section class="w-full flex flex-col items-center px-3">

        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full md:w-2/3 my-6">
            <center><h1 class="text-4xl font-bold mb-4 text-gray-800 p-6">Vítejte na stránkách obce!</h1></center>
            <section class="w-full flex justify-center my-6">
                <img src="<?php echo e(asset('import/assets/obec.jpg')); ?>" alt="Obec" class="rounded-lg shadow-lg">
            </section>
            <div class="p-6">
                <p class="text-lg text-gray-700 mb-6">
                    Objevte nejnovější informace o životě v naší obci, nadcházející události a aktuality.
                </p>
                <a href="<?php echo e(route('webhome', 'hlavni')); ?>" lass="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Zobrazit aktuality
                </a>
            </div>
        </div>
        <!-- Další sekce, například o obci -->
        <div class="w-full bg-white shadow-lg rounded-lg p-6 my-6 md:w-2/3">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">O Obci</h2>
            <p class="text-gray-600">
                Naše obec je známá svou bohatou historií a přátelskou komunitou. Připojte se k nám na společných akcích a sledujte aktuality!
            </p>
        </div>
        <div class="container mx-auto p-6">
            <div id="map" class="w-full h-96 rounded-lg shadow-lg"></div>
        </div>
    </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8995a876bdf490faf24c1d189b006974)): ?>
<?php $attributes = $__attributesOriginal8995a876bdf490faf24c1d189b006974; ?>
<?php unset($__attributesOriginal8995a876bdf490faf24c1d189b006974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8995a876bdf490faf24c1d189b006974)): ?>
<?php $component = $__componentOriginal8995a876bdf490faf24c1d189b006974; ?>
<?php unset($__componentOriginal8995a876bdf490faf24c1d189b006974); ?>
<?php endif; ?>
<?php /**PATH C:\Users\bohda\OneDrive\Plocha\Obec\resources\views/front/main.blade.php ENDPATH**/ ?>
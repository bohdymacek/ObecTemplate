<?php if (isset($component)) { $__componentOriginaleebe9a029fef138eeddf30686ab459d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleebe9a029fef138eeddf30686ab459d7 = $attributes; } ?>
<?php $component = App\View\Components\Layouts\Error::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layouts\Error::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="container min-vh-100 d-flex flex-column justify-content-center">
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <div class="error-template p-5 rounded-4 shadow-sm bg-white">
                <h1 class="display-1 fw-bold text-danger mb-4">403</h1>
                <div class="error-details">
                    <h2 class="fs-3"><i class="bi bi-lock-fill text-warning"></i> Přístup odepřen</h2>
                    <p class="lead text-muted my-4">
                        Omlouváme se, ale nemáte potřebná oprávnění k přístupu na tuto stránku.
                    </p>
                </div>
                <div class="error-actions mt-4">
                    <a href="<?php echo e(url('front.main')); ?>" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-house-door"></i> Domovská stránka
                    </a>
                    <button onclick="history.back()" class="btn btn-outline-primary btn-lg me-3">
                        <i class="bi bi-arrow-left"></i> Zpět
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    .error-template {
        border-top: 5px solid #dc3545;
    }
</style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleebe9a029fef138eeddf30686ab459d7)): ?>
<?php $attributes = $__attributesOriginaleebe9a029fef138eeddf30686ab459d7; ?>
<?php unset($__attributesOriginaleebe9a029fef138eeddf30686ab459d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleebe9a029fef138eeddf30686ab459d7)): ?>
<?php $component = $__componentOriginaleebe9a029fef138eeddf30686ab459d7; ?>
<?php unset($__componentOriginaleebe9a029fef138eeddf30686ab459d7); ?>
<?php endif; ?><?php /**PATH C:\Users\bohda\OneDrive\Plocha\Obec\resources\views/errors/403.blade.php ENDPATH**/ ?>
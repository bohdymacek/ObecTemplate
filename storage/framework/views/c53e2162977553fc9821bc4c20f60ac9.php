<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error - <?php echo e(config('app.name', 'Laravel')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php echo e($slot); ?>

</body>
</html><?php /**PATH C:\Users\bohda\OneDrive\Plocha\Obec\resources\views/components/layouts/error.blade.php ENDPATH**/ ?>
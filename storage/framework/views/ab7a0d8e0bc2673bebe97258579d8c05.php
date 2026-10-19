<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Clinic Patient Records'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7fb; }
        .navbar-brand { font-weight: 700; }
        .main-container { max-width: 1200px; margin: 35px auto; }
        .card { border: none; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.05); }
        .table th { white-space: nowrap; background-color: #f8fafc; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('patients.index')); ?>">Clinic Patient Records</a>
            <div class="ms-auto">
                <a href="<?php echo e(route('patients.index')); ?>" class="btn btn-outline-light btn-sm me-2">Patient List</a>
                <a href="<?php echo e(route('patients.create')); ?>" class="btn btn-light btn-sm">+ Register Patient</a>
            </div>
        </div>
    </nav>

    <main class="container main-container">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Please correct the following errors:</strong>
                <ul class="mb-0 mt-2">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\USER\clinic-crud\resources\views/layouts/app.blade.php ENDPATH**/ ?>
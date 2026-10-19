
<?php $__env->startSection('title', 'Patient List'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h2 class="fw-bold mb-1">Patient Records</h2>
        <p class="text-muted mb-0">Manage registered clinic patients.</p>
    </div>
    <a href="<?php echo e(route('patients.create')); ?>" class="btn btn-primary">+ Register New Patient</a>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card p-3">
            <div class="text-muted">Total Registered Patients</div>
            <h2 class="fw-bold text-primary mb-0"><?php echo e(number_format($totalPatients)); ?></h2>
        </div>
    </div>
</div>

<div class="card p-4">
    <form method="GET" action="<?php echo e(route('patients.index')); ?>" class="row g-2 mb-4">
        <div class="col-md-9">
            <input type="text" name="search" class="form-control" placeholder="Search patient number or name..." value="<?php echo e($search); ?>">
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary flex-fill">Search</button>
            <a href="<?php echo e(route('patients.index')); ?>" class="btn btn-outline-secondary">Clear</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Patient No.</th>
                    <th>Full Name</th>
                    <th>Birth Date</th>
                    <th>Sex</th>
                    <th>Contact Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($patient->patient_number); ?></td>
                    <td><?php echo e($patient->last_name); ?>, <?php echo e($patient->first_name); ?></td>
                    <td><?php echo e($patient->birth_date->format('M d, Y')); ?></td>
                    <td><?php echo e($patient->sex); ?></td>
                    <td><?php echo e($patient->contact_number ?: 'N/A'); ?></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?php echo e(route('patients.show', $patient)); ?>" class="btn btn-sm btn-outline-info">View</a>
                            <a href="<?php echo e(route('patients.edit', $patient)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="<?php echo e(route('patients.destroy', $patient)); ?>" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this patient record?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        <?php if($search): ?>
                            No patients found matching "<?php echo e($search); ?>".
                        <?php else: ?>
                            No patient records yet. Register your first patient.
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
        <small class="text-muted">
            Showing <?php echo e($patients->firstItem() ?? 0); ?> to <?php echo e($patients->lastItem() ?? 0); ?> of <?php echo e($patients->total()); ?> records
        </small>
        <?php echo e($patients->links('pagination::bootstrap-5')); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\clinic-crud\resources\views/patients/index.blade.php ENDPATH**/ ?>
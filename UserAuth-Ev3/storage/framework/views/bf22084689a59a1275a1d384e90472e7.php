<?php $__env->startSection('content'); ?>

<form action="<?php echo e(isset($project) ? route('proyects.update', $project->id) : route('proyects.store')); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <?php if(isset($project)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="form-group">
            <label>Nombre del Proyecto</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($project->name ?? old('name')); ?>">
        </div>

        <div class="form-group">
            <label>Fecha de Creación</label>
            <input type="date" name="creation_date" class="form-control" value="<?php echo e($project->creation_date ?? old('creation_date')); ?>">
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="active" class="form-check-input" <?php echo e((isset($project) && $project->active) ? 'checked' : ''); ?>>
            <label class="form-check-label">Activo</label>
        </div>

        <button type="submit" class="btn btn-success"><?php echo e(isset($project) ? 'Actualizar' : 'Crear'); ?></button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\GitHub\T2-70-DSW-I\UserAuth-Ev3\resources\views/proyects/create.blade.php ENDPATH**/ ?>
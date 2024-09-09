<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo e(isset($role) ? 'Editar Proyecto' : 'Crear Proyecto'); ?></h1>
                <?php if(isset($project)): ?>
                    <p>ID del Proyecto: <?php echo e($project->id); ?></p>
                <?php else: ?>
                    <p>No se encontró el proyecto.</p>
                <?php endif; ?>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
<form action="<?php echo e(route('proyects.update', ['proyect' => $project->id])); ?>" method="POST">


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

        <div class="form-group">
            <label for="active">Estado Activo:</label>
            <input type="checkbox" name="active" id="active" <?php echo e($project->active ? 'checked' : ''); ?>>
        </div>
        

        <button type="submit" class="btn btn-success"><?php echo e(isset($project) ? 'Actualizar' : 'Crear'); ?></button>
    </form>
                    </div></div></div></div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/patriciomelo/Documents/GitHub/T2-70-DSW-I/UserAuth-Ev3/resources/views/proyects/edit.blade.php ENDPATH**/ ?>
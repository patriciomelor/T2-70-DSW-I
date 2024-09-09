<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proyectos</h1>
        </div>
        <div class="col-sm-6">
   
        </div>
      </div>
    </div><!-- /.container-fluid -->
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
    <a href="<?php echo e(route('proyects.create')); ?>" class="btn btn-primary">Crear Proyecto</a>
            </div>

   <div class="card-body table-responsive content-loader">
            <table id="users-table" class="table table-striped table-light  table-hover table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de Creación</th>
                <th>Usuario</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $proyects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($project->name); ?></td>
                    <td><?php echo e($project->creation_date); ?></td>
                    <td><?php echo e($project->user->name ?? 'No disponible'); ?></td>

                    <td><?php echo e($project->active ? 'Sí' : 'No'); ?></td>
                    <td>
                        <a href="<?php echo e(route('proyects.edit', $project->id)); ?>" class="btn btn-warning">Editar</a>
                        <form action="<?php echo e(route('proyects.destroy', $project->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
   </div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\GitHub\T2-70-DSW-I\UserAuth-Ev3\resources\views/proyects/index.blade.php ENDPATH**/ ?>
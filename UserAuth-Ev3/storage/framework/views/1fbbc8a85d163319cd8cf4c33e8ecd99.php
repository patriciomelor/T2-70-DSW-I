<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-info">Crear Usuario</a>
                        </div>
                        <div class="card-body">
                            <table id="users-table" class="table table-striped table-light  table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Última Modificación</th> <!-- Nueva columna -->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;"><?php echo e($user->name); ?></td>
                                            <td style="text-align: center;vertical-align: middle;"><?php echo e($user->email); ?></td>
                                            <td style="text-align: center;vertical-align: middle;"><?php echo e($user->updatedBy->name ?? 'N/A'); ?></td>
                                            <!-- Mostrar el nombre del usuario que realizó la última modificación -->
                                            <td style="text-align: center;vertical-align: middle;">
                                                <a href="<?php echo e(route('users.edit', $user)); ?>"
                                                    class="btn btn-warning"><i class="fas fa-edit" style="color: white"></i></a>
                                                <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST"
                                                    style="display:inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                           
                                              
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\GitHub\T2-70-DSW-I\UserAuth-Ev3\resources\views/users/index.blade.php ENDPATH**/ ?>
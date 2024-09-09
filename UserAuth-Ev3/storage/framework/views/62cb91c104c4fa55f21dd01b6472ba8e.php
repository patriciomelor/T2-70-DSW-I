<?php $__env->startSection('content'); ?>
 <div class="card-header text-center">
     <a href="#" class="h1"><b><?php echo e(__('Login')); ?></b></a>
</div>
<div class="card-body">
<p class="login-box-msg">Complete los datos para ingresar</p>
        <form class="form-group" method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="email" required autofocus placeholder="<?php echo e(__('Email Address')); ?>">
                 <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                 </div>
                 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"id="password" required placeholder="<?php echo e(__('Password')); ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                       <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="row mb-3">
                            <div class="col-8 text-right">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" class="form-check-input" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label for="remember">
                                        <?php echo e(__('Recuérdame')); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Ingresar')); ?></button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <p class="mb-0">
                            <a href="<?php echo e(route('register.form')); ?>" class="text-center"><?php echo e(__('Registrarme')); ?></a>
                        </p>
                    </div>
                </div>
 
    </form>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\GitHub\T2-70-DSW-I\UserAuth-Ev3\resources\views/auth/login.blade.php ENDPATH**/ ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Terrasol')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!--CSS Adminlte-->
    <link href="<?php echo e(asset('css/adminlte.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/adminlte.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/fontawesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/all.css')); ?>" rel="stylesheet">


    <!--Font icon-->
    <script src="<?php echo e(asset('js/adminlte.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/adminlte.js')); ?>"></script>
    <!-- Scripts -->

</head>
<body class="login-page" color="grey">
    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div id="app"class="login-box">
    <div class="card card-outline card-primary">
            <?php echo $__env->yieldContent('content'); ?>     
    </div>
</div>
<script src="<?php echo e(asset('js/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery/jquery.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH /Users/patriciomelo/Documents/GitHub/T2-70-DSW-I/UserAuth-Ev3/resources/views/layouts/app.blade.php ENDPATH**/ ?>
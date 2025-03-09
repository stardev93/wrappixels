<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo e($allsettings->site_desc); ?>">
<meta name="keywords" content="<?php echo e($allsettings->site_keywords); ?>">

<?php if($allsettings->site_favicon != ''): ?>
<link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<link rel="shortcut icon" href="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>">
<?php endif; ?>

<style>[data-columns]::before{display:block;visibility:hidden;position:absolute;font-size:1px;}</style>


<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/animate.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/jquery-ui.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/linear-icon.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/fonts.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/slick-slider.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/editor.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('resources/views/static-style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/theme/validate/themes/red/red.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/assets/theme/pagination/pagination.css')); ?>">

<link rel="stylesheet" media="screen" href="<?php echo e(asset('public/assets/theme/css/vendor.min.css')); ?>">
<link rel="stylesheet" media="screen" href="<?php echo e(asset('public/assets/theme/css/theme.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('public/assets/theme/plugins/owl-carousel/owl.carousel.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/filter/jplist.core.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/assets/filter/jplist.jquery-ui-bundle.min.css')); ?>">

<link rel="stylesheet" media="screen" href="<?php echo e(asset('public/assets/lightbox/topbox.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/assets/video/video.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('public/assets/filter/jquery-ui.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('public/assets/theme/cookie/cookiealert.css')); ?>">

<?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('resources/views/static-new-style.css')); ?>">

<link rel="stylesheet" media="screen" href="<?php echo e(asset('public/assets/theme/countdown/jquery.countdown.css?v=1.0.0.0')); ?>">

<?php if($translate == 'ar'): ?>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/css/rtl.css')); ?>" />
<?php endif; ?>




<?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/stylesheet.blade.php ENDPATH**/ ?>
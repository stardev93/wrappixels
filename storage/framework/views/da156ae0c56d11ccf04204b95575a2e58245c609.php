<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3233,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo NoCaptcha::renderJs(); ?>

</head>

<body class="preload signup-page">

     <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    <?php echo e(Helper::translation(3233,$translate)); ?>

                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2862,$translate)); ?> / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/register')); ?>"><?php echo e(Helper::translation(3233,$translate)); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
    <section class="signup_area section--padding2">
        <div class="container">
        <div>
        <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger" role="alert">
        <span class="alert_icon lnr lnr-warning"></span>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
        <?php echo e($error); ?>


       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="lnr lnr-cross" aria-hidden="true"></span>
        </button>
        </div>
        <?php endif; ?>
        </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form method="POST" action="<?php echo e(route('register')); ?>" id="item_form">
                    <?php echo csrf_field(); ?>
                        <div class="cardify signup_form">
                            <div class="login--header">
                                <h3><?php echo e(Helper::translation(3234,$translate)); ?></h3>
                                <p><?php echo e(Helper::translation(3236,$translate)); ?>

                                </p>
                            </div>
                            

                            <div class="login--form">

                                <div class="form-group row">
                                   <div class="col-sm-6">
                                    <label for="urname"><?php echo e(Helper::translation(3237,$translate)); ?></label>
                                   <input id="name" type="text" class="text_field <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" placeholder="<?php echo e(Helper::translation(3238,$translate)); ?>" value="<?php echo e(old('name')); ?>" data-bvalidator="required" autocomplete="name" autofocus>
                                   <?php $__errorArgs = ['name'];
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
                                   <div class="col-sm-6">
                                   <label for="user_name"><?php echo e(Helper::translation(3111,$translate)); ?></label>
                                    <input id="username" type="text" name="username" class="text_field" placeholder="<?php echo e(Helper::translation(3239,$translate)); ?>" data-bvalidator="required">
                                   </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                      <label for="email_ad"><?php echo e(Helper::translation(3240,$translate)); ?></label>
                                   <input id="email" type="email" class="text_field <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(Helper::translation(3241,$translate)); ?>"  autocomplete="email" data-bvalidator="email,required">
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
                                    <div class="col-sm-6">
                                     <label for="password"><?php echo e(Helper::translation(3113,$translate)); ?></label>
                                        <input id="password" type="password" class="text_field <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="<?php echo e(Helper::translation(3242,$translate)); ?>" autocomplete="new-password" data-bvalidator="required">
    
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
                                </div>
                                

                                

                                <div class="form-group row">
                                   <div class="col-sm-6">
                                    <label for="con_pass"> <?php echo e(Helper::translation(3114,$translate)); ?></label>
                                   
                                    <input id="password-confirm" type="password" class="text_field" name="password_confirmation" placeholder="<?php echo e(Helper::translation(3243,$translate)); ?>" data-bvalidator="equal[password],required" autocomplete="new-password">
                                    </div>
                                    <div class="col-sm-6">
                                      <label for="email_ad"><?php echo e(Helper::translation(4827,$translate)); ?> <span class="required">*</span></label>
                                       <select id="user_type" class="text_field" name="user_type" data-bvalidator="required">
                                          <option value=""></option>
                                          <option value="<?php echo e($encrypter->encrypt('customer')); ?>"><?php echo e(Helper::translation(4830,$translate)); ?></option>
                                          <option value="<?php echo e($encrypter->encrypt('vendor')); ?>"><?php echo e(Helper::translation(3142,$translate)); ?></option>
                                       </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group<?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                                    <label for="con_pass"> <?php echo e(Helper::translation(3244,$translate)); ?></label>
                                   
                                 
                                </div>
                                
                                <button class="btn btn--md register_btn btn-outline-accent" type="submit"><?php echo e(Helper::translation(3233,$translate)); ?></button>

                                <div class="login_assist">
                                    <p><?php echo e(Helper::translation(3245,$translate)); ?>

                                        <a href="<?php echo e(URL::to('/login')); ?>" class="theme-color"><?php echo e(Helper::translation(3225,$translate)); ?></a>
                                    </p>
                                </div>
                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
    
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/auth/register.blade.php ENDPATH**/ ?>
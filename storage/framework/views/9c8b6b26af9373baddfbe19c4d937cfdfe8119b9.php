<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(2885,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload cart-page">

   
   <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    <?php echo e(Helper::translation(2885,$translate)); ?>

                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2862,$translate)); ?> / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/cart')); ?>"><?php echo e(Helper::translation(2885,$translate)); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
  
    <section class="cart_area section--padding2 bgcolor">
        <div class="container">
            
            <div>
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <span class="alert_icon lnr lnr-checkmark-circle"></span>
                        <?php echo e($message); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                    </div>
                <?php endif; ?>
            
                <?php if($message = Session::get('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="alert_icon lnr lnr-warning"></span>
                        <?php echo e($message); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                    </div>
                <?php endif; ?>
            
                <?php if(!$errors->isEmpty()): ?>
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                        <?php echo e($error); ?>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                </div>
                <?php endif; ?>
            </div>

           <form action="<?php echo e(route('coupon')); ?>" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
           <?php echo e(csrf_field()); ?> 
            <div class="row">
                <div class="col-md-12">
                    <div class="product_archive added_to__cart">
                        <div class="title_area">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4><?php echo e(Helper::translation(2886,$translate)); ?></h4>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="add_info"><?php echo e(Helper::translation(2887,$translate)); ?></h4>
                                </div>
                                <div class="col-md-3">
                                    <h4><?php echo e(Helper::translation(2888,$translate)); ?></h4>
                                </div>
                                <div class="col-md-2">
                                    <h4><?php echo e(Helper::translation(2889,$translate)); ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php if($cart_count != 0): ?>
                        <div class="row">
                        <?php 
                        $subtotal = 0;
                        $coupon_code = ""; 
                        $new_price = 0;
                        ?>
                        <?php $__currentLoopData = $cart['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12">
                                <div class="single_product clearfix">
                                    <div class="col-lg-4 col-md-7 v_middle">
                                        <div class="product__description">
                                        <a href="<?php echo e(url('/item')); ?>/<?php echo e($cart->item_slug); ?>/<?php echo e($cart->item_id); ?>">
                                            <?php if($cart->item_thumbnail!=''): ?>
                                            <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($cart->item_thumbnail); ?>" alt="<?php echo e($cart->item_name); ?>" class="cart-thumb">
                                            <?php else: ?>
                                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($cart->item_name); ?>" class="cart-thumb">
                                            <?php endif; ?>
                                            </a>
                                            <div class="short_desc">
                                                <a href="<?php echo e(url('/item')); ?>/<?php echo e($cart->item_slug); ?>/<?php echo e($cart->item_id); ?>">
                                                    <h4><?php echo e($cart->item_name); ?> </h4>
                                                </a>
                                                <!--<p>Nunc placerat mi id nisi inter dum mollis. Praesent phare...</p>-->
                                            </div>
                                        </div>
                                        <!-- end /.product__description -->
                                    </div>
                                    <!-- end /.col-md-5 -->

                                    <div class="col-lg-3 col-md-2 v_middle">
                                        <div class="product__additional_info">
                                            <ul>
                                                <li>
                                                    <?php echo e($cart->license); ?>

                                                    <?php if($cart->license == 'regular'): ?> 
                                                        (<?php echo e(Helper::translation(2890,$translate)); ?>) 
                                                    <?php elseif($cart->license == 'extended'): ?> 
                                                        (<?php echo e(Helper::translation(2891,$translate)); ?>) 
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end /.product__additional_info -->
                                    </div>
                                    <!-- end /.col-md-3 -->
                                    <?php
                                      if($cart->discount_price != 0)
                                      {
                                        $price = $cart->discount_price;
                                        $new_price += $cart->discount_price;
                                        $coupon_code = $cart->coupon_code;
                                        
                                      }
                                      else
                                      {
                                        $price = $cart->item_price;
                                        $new_price += $cart->item_price;
                                        
                                      }
                                    ?> 
                                    <div class="col-lg-3 col-md-3 v_middle">
                                        <div class="product__price_download">
                                            <div class="item_price v_middle">
                                                <?php if($cart->discount_price != 0): ?>
                                                <span><?php echo e($price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                <?php endif; ?>
                                                <span <?php if($cart->discount_price != 0): ?> class="cross-line" <?php endif; ?>><?php echo e($cart->item_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                            </div>
                                            
                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-3 v_middle">
                                        <div class="product__price_download" align="center">
                                            
                                            <div class="item_action v_middle">
                                                <a href="<?php echo e(url('/cart')); ?>/<?php echo e(base64_encode($cart->ord_id)); ?>" class="" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate)); ?>');">
                                                    <span class="lnr lnr-trash remove_carrt"></span>
                                                </a>
                                            </div>
                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>
                                    
                                    
                                    <!-- end /.col-md-4 -->
                                </div>
                                <!-- end /.single_product -->
                            </div>
                            <?php $subtotal += $cart->item_price; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                        <!-- end /.row -->

                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="cart_calculation">
                                <div class="cart--subtotal">
                                        <p class="coupon-block">
                                   <input type="text" class="form-control coupon-text" id="coupon" name="coupon" value="" required><button type="submit" class="btn btn--sm btn-outline-accent"><?php echo e(Helper::translation(2893,$translate)); ?></button></p>
                                    </div>
                                    <div class="cart--subtotal">
                                        <p>
                                            <span><?php echo e(Helper::translation(2894,$translate)); ?></span><?php echo e($subtotal); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    </div>
                                    <?php if($coupon_code != ""): ?>
                                    <?php 
                                    $coupon_discount = $subtotal - $new_price;
                                    $final = $new_price; 
                                    ?> 
                                    <div class="cart--subtotal">
                                        <p>
                                            <span><?php echo e(Helper::translation(2895,$translate)); ?></span><span class="fs14 green">( <?php echo e(Helper::translation(2866,$translate)); ?> : <strong><?php echo e($coupon_code); ?></strong> )<a href="<?php echo e(URL::to('/cart/')); ?>/remove/<?php echo e($coupon_code); ?>" class="red fs14" onClick="return confirm('<?php echo e(Helper::translation(2892,$translate)); ?>');" title="Remove"> <i class="fa fa-remove"></i> </a></span><?php echo e($coupon_discount); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    </div>
                                    <?php else: ?>
                                    <?php $final = $subtotal; ?>
                                    <?php endif; ?>
                                    <div class="cart--total">
                                        <p>
                                            <span><?php echo e(Helper::translation(2896,$translate)); ?></span><?php echo e($final); ?> <?php echo e($allsettings->site_currency); ?></p>
                                    </div>

                                    <a href="<?php echo e(url('/checkout')); ?>" class="btn btn--md checkout_link btn-outline-accent"><?php echo e(Helper::translation(2897,$translate)); ?></a>
                                </div>
                            </div>
                            <!-- end .col-md-12 -->
                        </div>
                        <?php endif; ?>
                        <?php if($cart_count == 0): ?>
                        <div class="row">
                            <div class="col-md-12 offset-md-12 noresult" align="center">
                            <?php echo e(Helper::translation(2898,$translate)); ?>

                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- end .row -->
                    </div>
                    <!-- end /.product_archive2 -->
                </div>
                <!-- end .col-md-12 -->
            </div>
            </form>
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
<?php endif; ?><?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/cart.blade.php ENDPATH**/ ?>
<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3211,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload dashboard-withdraw">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    <?php echo e(Helper::translation(3211,$translate)); ?>

                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2862,$translate)); ?> / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/withdrawal')); ?>"><?php echo e(Helper::translation(3211,$translate)); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="dashboard-area">
        
        <div class="dashboard_contents">
            <div class="container">
                <div>
                   
                    <?php if($message = Session::get('success')): ?>
                       <div class="alert alert-success" role="alert">
                            <span class="alert_icon lnr lnr-checkmark-circle"></span>
                            <?php echo e($message); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                    <?php endif; ?>
                    
                    
                    <?php if($message = Session::get('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <span class="alert_icon lnr lnr-warning"></span>
                            <?php echo e($message); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                    <?php endif; ?>
            
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
                    <div class="col-md-12">
                        <div class="dashboard_title_area clearfix">
                            <div class="dashboard__title pull-left">
                                <h3><?php echo e(Helper::translation(3212,$translate)); ?> <span class="theme-color"><?php echo e($allsettings->site_minimum_withdrawal); ?> <?php echo e($allsettings->site_currency); ?></span></h3>
                            </div>

                            <div class="pull-right">
                               
                            </div>
                        </div>
                        <!-- end /.dashboard_title_area -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                    <form action="<?php echo e(route('withdrawal')); ?>" class="setting_form" method="post" id="item_form" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                        <div class="withdraw_module cardify">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="modules__title">
                                        <h3><?php echo e(Helper::translation(3213,$translate)); ?></h3>
                                    </div>

                                    <div class="modules__content">
                                        
                                        <div class="options">
                                            <?php $no = 1; ?>
                                            <?php $__currentLoopData = $withdraw_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <div class="custom-radio">
                                                <input type="radio" id="withdrawal-<?php echo e($withdraw); ?>" class="" name="withdrawal" value="<?php echo e($withdraw); ?>" <?php if($no == 1): ?> checked <?php endif; ?>>
                                                <label for="withdrawal-<?php echo e($withdraw); ?>">
                                                    <span class="circle"></span><?php echo e($withdraw); ?></label>
                                            </div>
                                            
                                            
                                            <?php $no++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="withdraw_amount" id="ifpaypal">
                                                <div class="input-group">
                                                    <label class="payemail"><?php echo e(Helper::translation(3214,$translate)); ?></label>
                                                    <input type="text" id="paypal_email" name="paypal_email" class="text_field" data-bvalidator="email,required">
                                                </div>
                                                
                                            </div> 
                                            
                                            <div class="withdraw_amount" id="ifstripe">
                                                <div class="input-group">
                                                    <label class="payemail"><?php echo e(Helper::translation(3215,$translate)); ?></label>
                                                    <input type="text" id="stripe_email" name="stripe_email" class="text_field" data-bvalidator="email,required">
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="withdraw_amount" id="ifpaystack">
                                                <div class="input-group">
                                                    <label class="payemail">Paystack Email ID</label>
                                                    <input type="text" id="paystack_email" name="paystack_email" class="text_field" data-bvalidator="email,required">
                                                </div>
                                                
                                            </div> 
                                            
                                            <div class="withdraw_amount" id="iflocalbank">
                                                <div class="input-group">
                                                    <label class="payemail"><?php echo e(Helper::translation(4816,$translate)); ?></label>
                                                    <textarea id="bank_details" name="bank_details" class="text_field" data-bvalidator="required"></textarea>
                                                    <small><strong>Example:</strong><br/>
                                                    Bank Name : Test Bank<br/>
                                                    Branch Name : Test Branch<br/>
                                                    Branch Code : 00000<br/>
                                                    IFSC Code : 63632EF</small>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end /.options -->
                                    </div>
                                    <!-- end /.modules__content -->
                                </div>
                                <!-- end /.col-md-6 -->

                                <div class="col-lg-6">
                                    <div class="modules__title">
                                        <h3><?php echo e(Helper::translation(3216,$translate)); ?></h3>
                                    </div>

                                    <div class="modules__content">
                                        <p class="subtitle"><?php echo e(Helper::translation(3217,$translate)); ?></p>
                                        <div class="options">
                                            <div>
                                                
                                                <label>
                                                    <span class="circle"></span><?php echo e(Helper::translation(3218,$translate)); ?>:
                                                    <span class="bold"><?php echo e(Auth::user()->earnings); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                </label>
                                            </div>

                                            <input type="hidden" name="available_balance" value="<?php echo e(base64_encode(Auth::user()->earnings)); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                            <input type="hidden" name="user_token" value="<?php echo e(Auth::user()->user_token); ?>">

                                            <div class="withdraw_amount">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><?php echo e($allsettings->site_currency); ?></span>
                                                    <input type="text" id="rlicense" name="get_amount" class="text_field" data-bvalidator="digit,min[<?php echo e($allsettings->site_minimum_withdrawal); ?>],max[<?php echo e(Auth::user()->earnings); ?>],required">
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="button_wrapper">
                                            <button type="submit" class="btn btn--md theme-button"><?php echo e(Helper::translation(3219,$translate)); ?></button>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.col-md-6 -->
                            </div>
                            <!-- end /.row -->
                        </div>
                        </form>
                        <!-- end /.withdraw_module -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="withdraw_module withdraw_history">
                            <div class="withdraw_table_header">
                                <h3><?php echo e(Helper::translation(3220,$translate)); ?></h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table withdraw__table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(Helper::translation(3172,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(3213,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(3214,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(3215,$translate)); ?></th>
                                            <th>Paystack Email ID</th>
                                            <th><?php echo e(Helper::translation(4816,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(3224,$translate)); ?></th>
                                            <th><?php echo e(Helper::translation(2873,$translate)); ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(date('d F Y', strtotime($withdrawal->wd_date))); ?></td>
                                            <td><?php echo e($withdrawal->withdraw_type); ?></td>
                                            <td><?php if($withdrawal->paypal_email != ""): ?><?php echo e($withdrawal->paypal_email); ?><?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <td><?php if($withdrawal->stripe_email != ""): ?><?php echo e($withdrawal->stripe_email); ?><?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <td><?php if($withdrawal->paystack_email != ""): ?><?php echo e($withdrawal->paystack_email); ?><?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <td><?php if($withdrawal->bank_details != ""): ?> <?php echo nl2br($withdrawal->bank_details); ?> <?php else: ?> <span>---</span> <?php endif; ?></td>
                                            <td class="bold"><?php echo e($withdrawal->wd_amount); ?> <?php echo e($allsettings->site_currency); ?></td>
                                            <td class="<?php if($withdrawal->wd_status == 'pending'): ?> pending <?php else: ?> paid <?php endif; ?>">
                                                <span><?php echo e($withdrawal->wd_status); ?></span>
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
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    
    
   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/withdrawal.blade.php ENDPATH**/ ?>
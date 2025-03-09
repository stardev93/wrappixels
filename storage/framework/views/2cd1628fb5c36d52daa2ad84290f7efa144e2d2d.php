<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3028,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="preload term-condition-page">

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div id="demo">

    <section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                        <?php echo e(Helper::translation(3028,$translate)); ?>

                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2862,$translate)); ?> / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="<?php echo e(URL::to('/top-authors')); ?>"><?php echo e(Helper::translation(3028,$translate)); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="term_condition_area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">                
                    <div class="user_area">
                        <ul>
                            <?php $__currentLoopData = $user['user']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($count_sale->has($user->id) != 0): ?>
                                    <?php
                                        $membership = date('m/d/Y',strtotime($user->created_at));
                                        $membership_date = explode("/", $membership);
                                        $year = (date("md", date("U", mktime(0, 0, 0, $membership_date[0], $membership_date[1], $membership_date[2]))) > date("md") ? ((date("Y") - $membership_date[2]) - 1) : (date("Y") - $membership_date[2]));
                                        $referral_count = $user->referral_count;  
                                    ?>     
                                    <li class="li-item border_bottom" style="display: list-item;">
                                        <div class="user_single">
                                            <div class="user__short_desc own-user">

                                                <div class="user_avatar">
                                                    <a href="<?php echo e(url('/user')); ?>/<?php echo e($user->username); ?>">
                                                    <?php if($user->user_photo != ''): ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user->user_photo); ?>" alt="" width="70" class="rounded">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($user->name); ?>" width="70" class="rounded">
                                                    <?php endif; ?>
                                                    </a>
                                                </div>

                                                <div class="user_info">
                                                    <a href="<?php echo e(url('/user')); ?>/<?php echo e($user->username); ?>"><?php echo e($user->name); ?></a>
                                                    <br/>

                                                    <?php if($user->country_badge == 1): ?>
                                                        <div class="social social--color--filled">
                                                            <ul>
                                                                <?php if($user->country_badges != ""): ?>
                                                                    <li>
                                                                      <img src="<?php echo e(url('/')); ?>/public/storage/flag/<?php echo e($user->country_badges); ?>" border="0" class="icon-badges" title="Located in <?php echo e($user->country_name); ?>">  
                                                                    </li>
                                                                <?php endif; ?>

                                                                <?php if($user->exclusive_author == 1): ?>
                                                                    <li>
                                                                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->exclusive_author_icon); ?>" border="0" class="other-badges" title="Exclusive Author: Sells items exclusively on <?php echo e($allsettings->site_title); ?>">
                                                                    </li>
                                                                <?php endif; ?>

                                                                <?php if($year == 1): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->one_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($year == 2): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->two_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($year == 3): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->three_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                
                                                                <?php if($year == 4): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->four_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($year == 5): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->five_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?> 
                                                                
                                                                <?php if($year == 6): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->six_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($year == 7): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->seven_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($year == 8): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->eight_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($year == 9): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->nine_year_icon); ?>" border="0" class="other-badges" title="<?php echo e($year); ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php echo e($year); ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($year >= 10): ?>
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->ten_year_icon); ?>" border="0" class="other-badges" title="<?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> Years of Membership: Has been part of the <?php echo e($allsettings->site_title); ?> Community for over <?php if($year >= 10): ?> 10+ <?php else: ?> <?php echo e($year); ?> <?php endif; ?> years">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count): ?> 
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_one_icon); ?>" border="0" class="other-badges" title="Affiliate Level 1: Has referred <?php echo e($badges['setting']->author_referral_level_one); ?>+ members">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count): ?> 
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_two_icon); ?>" border="0" class="other-badges" title="Affiliate Level 2: Has referred <?php echo e($badges['setting']->author_referral_level_two); ?>+ members">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count): ?> 
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_three_icon); ?>" border="0" class="other-badges" title="Affiliate Level 3: Has referred <?php echo e($badges['setting']->author_referral_level_three); ?>+ members">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count): ?> 
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_four_icon); ?>" border="0" class="other-badges" title="Affiliate Level 4: Has referred <?php echo e($badges['setting']->author_referral_level_four); ?>+ members">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count): ?> 
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_five_icon); ?>" border="0" class="other-badges" title="Affiliate Level 5: Has referred <?php echo e($badges['setting']->author_referral_level_five); ?>+ members">
                                                                </li>
                                                                <?php endif; ?>
                                                                
                                                                
                                                                <?php if($referral_count >= $badges['setting']->author_referral_level_six): ?> 
                                                                <li>
                                                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_referral_level_six_icon); ?>" border="0" class="other-badges" title="Affiliate Level 6: Has referred <?php echo e($badges['setting']->author_referral_level_six); ?>+ members">
                                                                </li>
                                                                <?php endif; ?>
                                                    
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>                         
                                                </div>
                                            </div>

                                            <div class="user__meta own-next">
                                                <p><?php echo e($count_items->has($user->id) ? count($count_items[$user->id]) : 0); ?> Items</p>
                                                <p><?php echo e(Helper::translation(3077,$translate)); ?> <?php echo e(date("F Y", strtotime($user->created_at))); ?></p>
                                                <p><?php if($user->country_badge == 1): ?><?php echo e($user->country_name); ?><?php endif; ?></p>
                                                
                                            </div>


                                            <div class="user__status user--following text-center last-next">
                                                <p><span class="sale-count"><?php echo e($count_sale->has($user->id) ? count($count_sale[$user->id]) : 0); ?></span><br/><?php echo e(Helper::translation(2930,$translate)); ?></p>
                                                <?php
                                                if(count($user->ratings) != 0)
                                                {
                                                    $top = 0;
                                                    $bottom = 0;
                                                    
                                                    foreach($user->ratings as $view)
                                                    { 
                                                        if($view->rating == 1){ $value1 = $view->rating*1; } else { $value1 = 0; }
                                                        if($view->rating == 2){ $value2 = $view->rating*2; } else { $value2 = 0; }
                                                        if($view->rating == 3){ $value3 = $view->rating*3; } else { $value3 = 0; }
                                                        if($view->rating == 4){ $value4 = $view->rating*4; } else { $value4 = 0; }
                                                        if($view->rating == 5){ $value5 = $view->rating*5; } else { $value5 = 0; }
                                                        $top += $value1 + $value2 + $value3 + $value4 + $value5;
                                                        $bottom += $view->rating;
                                                
                                                    }
                                                
                                                
                                                    if(!empty(round($top/$bottom)))
                                                    {
                                                        $count_rating = round($top/$bottom);
                                                    }
                                                    else
                                                    {
                                                       $count_rating = 0;
                                                    }
                                                }
                                                else
                                                {
                                                  $count_rating = 0;
                                                }  
                                                ?>

                                                <div class="rating product--rating">
                                                    <ul>
                                                        <?php if($count_rating == 0): ?>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                       <?php endif; ?> 
                                                       <?php if($count_rating == 1): ?>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                       <?php endif; ?> 
                                                       <?php if($count_rating == 2): ?>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                       <?php endif; ?>
                                                       <?php if($count_rating == 3): ?>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                       <?php endif; ?>
                                                       <?php if($count_rating == 4): ?>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star-o"></span>
                                                        </li>
                                                       <?php endif; ?>
                                                       <?php if($count_rating == 5): ?>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                        <li>
                                                            <span class="fa fa-star"></span>
                                                        </li>
                                                       <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>
                    </div>
				
                </div>
            </div>
        </div>
    </section>
</div>
    
   <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/top-authors.blade.php ENDPATH**/ ?>
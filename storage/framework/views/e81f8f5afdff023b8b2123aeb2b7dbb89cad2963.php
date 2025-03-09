<div class="col-lg-4 col-md-12" style="margin-top: -3.7rem">
    <aside class="sidebar sidebar_author pt-4 pt-lg-0">
        <div class="author-card sidebar-card rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0">
            
            <div class="px-4 mb-4">
                <div class="media align-items-center">
                    <div class="img-thumbnail rounded-circle position-relative" style="width: 7rem; margin-top: 1.5rem">
                        <?php if($user['user']->user_photo != ''): ?>
                            <img class="rounded-circle" src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($user['user']->user_photo); ?>" alt="<?php echo e($user['user']->username); ?>">
                            <?php else: ?>
                            <img class="rounded-circle" src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($user['user']->username); ?>">
                        <?php endif; ?>      
                    </div>
                    <div class="media-body pl-3">
                      <h3 class="font-size-base mb-0"><?php echo e($user['user']->username); ?></h3>
                      <span class="text-accent font-size-sm"><?php echo e($user['user']->email); ?></span>
                    </div>
                </div>
                <p style="text-align: center; margin-top: 1rem">
                    <?php if($user['user']->user_type == 'vendor'): ?>
                    <?php if($user['user']->country_badge == 1): ?><?php echo e($country['view']->country_name); ?>,<?php endif; ?> <?php endif; ?> <?php if($user['user']->user_type == 'customer'): ?> <?php if($user['user']->country != ''): ?> <?php echo e($country['view']->country_name); ?>, <?php endif; ?> <?php endif; ?> <?php echo e(Helper::translation(3077,$translate)); ?> <?php echo e($since); ?>

               </p>
            </div>

             <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Account</h3>
            </div>

            <ul class="list-unstyled mb-0">
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="<?php echo e(url('/user-profile')); ?>/<?php echo e($user['user']->username); ?>">
                        <i class="dwg-settings opacity-60 mr-2"></i><?php echo e(Helper::translation(2926,$translate)); ?>

                    </a>
                </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="<?php echo e(URL::to('/user-purchases')); ?>/<?php echo e($user['user']->username); ?>">
                        <i class="dwg-basket opacity-60 mr-2"></i><?php echo e(Helper::translation(3024,$translate)); ?></a>
                    </li>
                <li class="border-bottom mb-0">
                    <a class="nav-link-style d-flex align-items-center px-4 py-3" href="<?php echo e(URL::to('/user-favourites')); ?>/<?php echo e($user['user']->username); ?>">
                        <i class="dwg-heart opacity-60 mr-2"></i><?php echo e(Helper::translation(2929,$translate)); ?></a>
                </li>
                <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="<?php echo e(URL::to('/user-withdrawals')); ?>/<?php echo e($user['user']->username); ?>">
                    <i class="dwg-currency-exchange opacity-60 mr-2"></i><?php echo e(Helper::translation(2933,$translate)); ?></a>
                </li>
                <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="<?php echo e(url('/logout')); ?>">
                  <i class="dwg-sign-out opacity-60 mr-2"></i><?php echo e(Helper::translation(3023,$translate)); ?></a>
                </li>
            </ul>


            <div class="author-infos">
                
                
                <?php if($user['user']->user_type == 'vendor'): ?>
                <div class="social social--color--filled">
                    <ul>
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                        <div class="sidebar-card card--metadata">
                            <div>
                                    <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>" border="0" class="single-badges" title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : Sold more than <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ on <?php echo e($allsettings->site_title); ?>" /> 
                                    <?php echo e($badges['setting']->author_sold_level_six_label); ?>

                            </div>
                            
                        </div> 
                        <?php endif; ?>
                         <?php if($user['user']->country_badge == 1): ?>
                        <?php if($country['view']->country_badges != ""): ?>
                        <li>
                          <img src="<?php echo e(url('/')); ?>/public/storage/flag/<?php echo e($country['view']->country_badges); ?>" border="0" class="icon-badges" title="Located in <?php echo e($country['view']->country_name); ?>">  
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php if($featured_count->has($user['user']->id) ? count($featured_count[$user['user']->id]) : 0 != 0): ?>
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->featured_item_icon); ?>" border="0" class="other-badges" title="Featured Item: Had an item featured on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($free_count->has($user['user']->id) ? count($free_count[$user['user']->id]) : 0 != 0): ?>
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->free_item_icon); ?>" border="0" class="other-badges" title="Free Item : Contributed a free file of this item">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($tren_count->has($user['user']->id) ? count($tren_count[$user['user']->id]) : 0 != 0): ?>
                         <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->trends_icon); ?>" border="0" class="other-badges" title="Trendsetter: Had an item that was trending">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($user['user']->exclusive_author == 1): ?>
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
                        
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_one_icon); ?>" border="0" class="other-badges" title="Author Level 1: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_one); ?>+ on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_two &&  $badges['setting']->author_sold_level_three > $sold_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_two_icon); ?>" border="0" class="other-badges" title="Author Level 2: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_two); ?>+ on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_three &&  $badges['setting']->author_sold_level_four > $sold_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->	author_sold_level_three_icon); ?>" border="0" class="other-badges" title="Author Level 3: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_three); ?>+ on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_four &&  $badges['setting']->author_sold_level_five > $sold_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_four_icon); ?>" border="0" class="other-badges" title="Author Level 4: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_four); ?>+ on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_five &&  $badges['setting']->author_sold_level_six > $sold_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_five_icon); ?>" border="0" class="other-badges" title="Author Level 5: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_five); ?>+ on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_sold_level_six_icon); ?>" border="0" class="other-badges" title="Author Level 6: Has sold <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($sold_amount >= $badges['setting']->author_sold_level_six): ?>
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->power_elite_author_icon); ?>" border="0" class="other-badges" title="<?php echo e($badges['setting']->author_sold_level_six_label); ?> : Sold more than <?php echo e($allsettings->site_currency); ?> <?php echo e($badges['setting']->author_sold_level_six); ?>+ on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_one_icon); ?>" border="0" class="other-badges" title="Collector Level 1: Has collected <?php echo e($badges['setting']->author_collect_level_one); ?>+ items on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_two_icon); ?>" border="0" class="other-badges" title="Collector Level 2: Has collected <?php echo e($badges['setting']->author_collect_level_two); ?>+ items on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_three_icon); ?>" border="0" class="other-badges" title="Collector Level 3: Has collected <?php echo e($badges['setting']->author_collect_level_three); ?>+ items on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_four_icon); ?>" border="0" class="other-badges" title="Collector Level 4: Has collected <?php echo e($badges['setting']->author_collect_level_four); ?>+ items on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_five_icon); ?>" border="0" class="other-badges" title="Collector Level 5: Has collected <?php echo e($badges['setting']->author_collect_level_five); ?>+ items on <?php echo e($allsettings->site_title); ?>">
                        </li>
                        <?php endif; ?>
                        
                        <?php if($collect_amount >= $badges['setting']->author_collect_level_six): ?> 
                        <li>
                        <img src="<?php echo e(url('/')); ?>/public/storage/badges/<?php echo e($badges['setting']->author_collect_level_six_icon); ?>" border="0" class="other-badges" title="Collector Level 6: Has collected <?php echo e($badges['setting']->author_collect_level_six); ?>+ items on <?php echo e($allsettings->site_title); ?>">
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
                <!-- end /.social -->

                <div class="author-btn">
                <?php if(Auth::guest()): ?>
                    <a href="javascript:void(0);" class="btn btn--md theme-button" onClick="alert('Login user only');"><?php echo e(Helper::translation(3202,$translate)); ?></a>
                <?php endif; ?> 
                <?php if(Auth::check()): ?>
                <?php if($user['user']->username != Auth::user()->username): ?>
                <?php if($followcheck == 0): ?>
                <a href="<?php echo e(url('/user')); ?>/<?php echo e(Auth::user()->id); ?>/<?php echo e($user['user']->id); ?>" class="btn btn--md theme-button"><?php echo e(Helper::translation(3202,$translate)); ?></a>
                <?php else: ?>
                <a href="<?php echo e(url('/user')); ?>/unfollow/<?php echo e(Auth::user()->id); ?>/<?php echo e($user['user']->id); ?>" class="btn btn--md theme-primary"><?php echo e(Helper::translation(3203,$translate)); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>   
                </div>
                
                <!-- end /.author-btn -->
            </div>
            <!-- end /.author-infos -->


        </div>
  
        <?php if($user['user']->user_freelance == 1): ?>
        <div class="sidebar-card freelance-status">
            <div class="custom-radio freelance">
                <input type="radio" id="opt1" class="" name="filter_opt" checked>
                <label for="opt1">
                    <span class="circle"></span><?php echo e(Helper::translation(3208,$translate)); ?></label>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if(Auth::check()): ?>
        <?php if($user['user']->username != Auth::user()->username): ?>
        <div class="sidebar-card message-card">
            

            <div class="card-title">
                <h4><?php echo e(Helper::translation(2915,$translate)); ?> <?php echo e($user['user']->username); ?></h4>
            </div>

            <div class="message-form">
                
                <form action="<?php echo e(route('user')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <textarea name="message" class="text_field" id="author-message" placeholder="<?php echo e(Helper::translation(3209,$translate)); ?>" data-bvalidator="required"></textarea>
                    </div>
                    
                    <input type="hidden" name="from_email" value="<?php echo e(Auth::user()->email); ?>" />
                    <input type="hidden" name="from_name" value="<?php echo e(Auth::user()->name); ?>" />
                    <input type="hidden" name="to_email" value="<?php echo e($user['user']->email); ?>" />
                    <input type="hidden" name="to_name" value="<?php echo e($user['user']->name); ?>" />

                    <div class="msg_submit">
                        <button type="submit" class="btn btn--md theme-button"><?php echo e(Helper::translation(3210,$translate)); ?></button>
                    </div>
                </form>
                
                   
            </div>
             
           
           
        </div>
        <?php endif; ?>
        <?php endif; ?>
        
        
         <?php if(Auth::guest()): ?>
        <div class="sidebar-card message-card">
            
            <div class="card-title">
                <h4><?php echo e(Helper::translation(2915,$translate)); ?> <?php echo e($user['user']->username); ?></h4>
            </div>

            <div class="message-form">
             
                <p> <?php echo e(Helper::translation(3061,$translate)); ?>

                    <a href="<?php echo e(url('/login')); ?>" class="theme-color"><?php echo e(Helper::translation(3020,$translate)); ?></a> <?php echo e(Helper::translation(3062,$translate)); ?></p>
                
            </div>
            
        </div>
        <?php endif; ?> 
        
      
    </aside>
</div>                        
                        <?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/user-menu.blade.php ENDPATH**/ ?>
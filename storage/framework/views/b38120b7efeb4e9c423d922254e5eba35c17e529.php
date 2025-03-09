<footer class="footer-big pt-5">
    <div class="container pt-2 pb-3">
        <div class="row">

            <div class="col-md-3 text-center text-md-left mb-4">
           
                <div class="text-nowrap mb-3">
                    <?php if($allsettings->site_logo != ''): ?>
                        <a class="navbar-brand d-none d-sm-block mr-4 order-lg-1" href="<?php echo e(URL::to('/')); ?>" style="min-width: 7rem">
                            <img width="120" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>" alt="<?php echo e($allsettings->site_title); ?>">
                        </a>
                    <?php endif; ?>
                </div>

                <h6 class="pr-3 mr-3"><span class="text-primary"><?php echo e($total_sale); ?></span><span class="font-weight-normal text-white"><?php echo e(Helper::translation(2930,$translate)); ?></span></h6>
                <h6 class="mr-3"><span class="text-primary"><?php echo e($member_count); ?></span><span class="font-weight-normal text-white"><?php echo e(Helper::translation(3002,$translate)); ?></span></h6>
                
                <div class="widget mt-4 text-md-nowrap text-center text-md-left">
                    <?php if($allsettings->facebook_url != ''): ?>
                        <a class="social-btn sb-light sb-facebook mr-2 mb-2" href="<?php echo e($allsettings->facebook_url); ?>" target="_blank"><i class="dwg-facebook"></i></a>
                    <?php endif; ?>
                    <?php if($allsettings->twitter_url != ''): ?>
                        <a class="social-btn sb-light sb-twitter mr-2 mb-2" href="<?php echo e($allsettings->twitter_url); ?>" target="_blank"><i class="dwg-twitter"></i></a>
                    <?php endif; ?>
                    <?php if($allsettings->pinterest_url != ''): ?>
                        <a class="social-btn sb-light sb-pinterest mr-2 mb-2" href="<?php echo e($allsettings->pinterest_url); ?>" target="_blank"><i class="dwg-pinterest"></i></a>
                    <?php endif; ?>
                    <?php if($allsettings->gplus_url != ''): ?>
                        <a class="social-btn sb-light sb-dribbble mr-2 mb-2" href="<?php echo e($allsettings->gplus_url); ?>" target="_blank"><i class="dwg-google"></i></a>
                    <?php endif; ?>
                    <?php if($allsettings->instagram_url != ''): ?>
                        <a class="social-btn sb-light sb-behance mr-2 mb-2" href="<?php echo e($allsettings->instagram_url); ?>" target="_blank"><i class="dwg-instagram"></i></a>
                    <?php endif; ?>
                    <?php if($allsettings->linkedin_url != ''): ?>
                        <a class="social-btn sb-light sb-behance mr-2 mb-2" href="<?php echo e($allsettings->linkedin_url); ?>" target="_blank"><i class="dwg-linkedin"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
                <div class="widget widget-links widget-light pb-2">
                    <h3 class="widget-title text-light"><?php echo e(Helper::translation(3004,$translate)); ?></h3>
                    <ul class="widget-list">
                        <?php $__currentLoopData = $maincategory['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maincategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="widget-list-item">
                                <a href="<?php echo e(URL::to('/shop/category/')); ?>/<?php echo e($maincategory->cat_id); ?>/<?php echo e($maincategory->category_slug); ?>"><?php echo e($maincategory->category_name); ?></a>
                            </li> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
                <div class="widget widget-links widget-light pb-2">
                    <h3 class="widget-title text-light"><?php echo e(Helper::translation(2999,$translate)); ?></h3>
                    <ul class="widget-list">
                        <?php if($allsettings->site_blog_display == 1): ?>
                            <li><a href="<?php echo e(URL::to('/blog')); ?>"><?php echo e(Helper::translation(2877,$translate)); ?></a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(URL::to('/contact')); ?>"><?php echo e(Helper::translation(2910,$translate)); ?></a></li>
                        <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_id); ?>/<?php echo e($pages->page_slug); ?>"><?php echo e($pages->page_title); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 d-none d-md-block text-center text-md-left mb-4">
                <div class="widget widget-links widget-light pb-2">
                    <h3 class="widget-title text-light"><?php echo e(Helper::translation(3005,$translate)); ?></h3>
                    <p><?php echo e($allsettings->site_newsletter); ?></p>
                    <ul class="widget-list">
                        <?php if($message = Session::get('news-success')): ?>
                            <div class="alert alert-success" role="alert">
                                <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                <?php echo e($message); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if($message = Session::get('news-error')): ?>
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
                                <span class="alert_icon lnr lnr-warning">
                                </span>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php echo e($error); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="lnr lnr-cross" aria-hidden="true"></span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('newsletter')); ?>" id="footer_form" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="input-group">  
                                <input type="email" class="form-control" placeholder="<?php echo e(Helper::translation(3006,$translate)); ?>" data-bvalidator="required" name="news_email">
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-accent btn--sm theme-button" type="submit"><?php echo e(Helper::translation(3007,$translate)); ?></button>
                                 
                                </span>
                            </div>
                        </form>  

                    </ul>
                </div>

            </div>

        </div>
    </div>


    <div class="pt-4 bg-darker">
        <div class="container">
            <div class="d-md-flex justify-content-between">
                <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">
                    <p>&copy; <?php echo e(date('Y')); ?>

                        <a href="<?php echo e(URL::to('/')); ?>"><?php echo e($allsettings->site_title); ?></a>. <?php echo e(Helper::translation(3008,$translate)); ?>

                    </p>
                </div>
                <div class="widget widget-links widget-light pb-4">
                    <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                        <?php $__currentLoopData = $footerpages['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="widget-list-item ml-4"><a class="widget-list-link font-size-ms" href="<?php echo e(URL::to('/page/')); ?>/<?php echo e($pages->page_id); ?>/<?php echo e($pages->page_slug); ?>"><?php echo e($pages->page_title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </ul>
                </div>
                
            </div>
        </div>
    </div>

</footer>


<div class="alert text-center cookiealert" role="alert">
        Do you like cookies? We use cookies to ensure you get the best experience on our website.
        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
            Allow Cookies
        </button>
</div>
<a class="btn-scroll-top go_top" href="#top" data-scroll style="z-index:1000">
    <span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2"><?php echo e(__('Top')); ?></span>
    <i class="btn-scroll-top-icon dwg-arrow-up"></i>
</a>


<?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/footer.blade.php ENDPATH**/ ?>
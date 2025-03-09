<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php if($allsettings->site_logo != ''): ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="180"/></a>
                <?php else: ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,10)); ?></a>
                <?php endif; ?>
                <?php if($allsettings->site_favicon != ''): ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="24"/></a>
                <?php else: ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,1)); ?></a>
                <?php endif; ?>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo e(url('/admin')); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/general-settings')); ?>">General Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/currency-settings')); ?>">Currency Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/country-settings')); ?>">Country Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/email-settings')); ?>">Email Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/media-settings')); ?>">Media Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/badges-settings')); ?>">Badges Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/payment-settings')); ?>">Payment Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/social-settings')); ?>">Social Settings</a></li>
                        </ul>
                    </li>
                    
                   <li class="menu-item-has-children dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Members</a>
                        <ul class="sub-menu children dropdown-menu">
                           
                            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/customer')); ?>">Customers</a></li>
                            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/vendor')); ?>">Vendors</a></li>
                         </ul>
                    </li>
                                       
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/pages')); ?>">Pages</a></li>
                           </ul>
                    </li>

                   

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-location-arrow"></i>Items</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/category')); ?>">Category</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/sub-category')); ?>">Sub Category</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/items')); ?>">Items</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/item-type')); ?>">Item Type</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/attributes')); ?>">Attributes</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/orders')); ?>">Orders</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="<?php echo e(url('/admin/refund')); ?>"> <i class="menu-icon fa fa-paper-plane"></i>Refund Request </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo e(url('/admin/rating')); ?>"> <i class="menu-icon fa fa-star"></i>Rating & Reviews </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo e(url('/admin/withdrawal')); ?>"> <i class="menu-icon fa fa-money"></i>Withdrawal Request </a>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Blog</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/blog-category')); ?>">Category</a></li>
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/post')); ?>">Post</a></li>
                        </ul>
                    </li>
                    
                    
                    
                    <li>
                        <a href="<?php echo e(url('/admin/highlights')); ?>"> <i class="menu-icon fa fa-magic"></i>Features </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo e(url('/admin/start-selling')); ?>"> <i class="menu-icon fa fa-shopping-cart"></i>Start Selling </a>
                    </li>
                    
                    
                    <li>
                        <a href="<?php echo e(url('/admin/contact')); ?>"> <i class="menu-icon fa fa-address-book-o"></i>Contact </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/admin/newsletter')); ?>"> <i class="menu-icon fa fa-newspaper-o"></i>Newsletter </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/admin/languages')); ?>"> <i class="menu-icon fa fa-language"></i>Languages </a>
                    </li>
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/admin/navigation.blade.php ENDPATH**/ ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>General Settings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
         <?php echo e($error); ?>

      
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 <?php endif; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       
                        
                        
                      
                        <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                           <form action="<?php echo e(route('admin.general-settings')); ?>" method="post" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>
                          
                           <div class="col-md-6">
                           
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Title <span class="require">*</span></label>
                                                <input id="site_title" name="site_title" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_title); ?>" required>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Meta Description (max 160 chars)<span class="require">*</span></label>
                                                
                                            <textarea name="site_desc" id="site_desc" rows="6" placeholder="site description" class="form-control noscroll_textarea" maxlength="160" required><?php echo e($setting['setting']->site_desc); ?></textarea>
                                            </div>
                                                
                                               <div class="form-group">
                                                <label for="site_keywords" class="control-label mb-1">Meta Keywords (max 160 chars)<span class="require">*</span></label>
                                                
                                            <textarea name="site_keywords" id="site_keywords" rows="6" placeholder="separate keywords with commas" class="form-control noscroll_textarea" maxlength="160" required><?php echo e($setting['setting']->site_keywords); ?></textarea>
                                            </div>  
                                                
                                                
                                              <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Currency <span class="require">*</span></label>
                                                <select name="site_currency" class="form-control" required>
                                                <option value=""></option>
                                                <?php $__currentLoopData = $currencyData['currency']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($currency->currency_code); ?>" <?php if($currency->currency_code == $setting['setting']->site_currency): ?> selected="selected" <?php endif; ?>><?php echo e($currency->currency_code); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                            </div>  
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1">Banner (size 1920 x 300)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_banner" name="site_banner" class="form-control-file" <?php if($setting['setting']->site_banner == ''): ?> required <?php endif; ?>>
                                            <?php if($setting['setting']->site_banner != ''): ?>
                                                <img height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_banner); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Item Auto Approval? <span class="require">*</span></label>
                                                <select name="item_approval" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->item_approval == 1): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($setting['setting']->item_approval == 0): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                                <small>(if <strong>Yes</strong> selected vendor item will published automatically) </small>
                                                
                                            </div>  
                                            
                                            
                                            
                                             <div class="form-group">
                                                <label for="site_blog_adbanner" class="control-label mb-1">Blog Ad Banner (size 360 x 270)</label>
                                                
                                            <input type="file" id="site_blog_adbanner" name="site_blog_adbanner" class="form-control-file">
                                            <?php if($setting['setting']->site_blog_adbanner != ''): ?>
                                                <img height="50" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_blog_adbanner); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Blog Ad Banner Link</label>
                                                <input id="site_blog_adbanner_link" name="site_blog_adbanner_link" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_blog_adbanner_link); ?>" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Email</label>
                                                <input id="office_email" name="office_email" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->office_email); ?>" required>
                                            </div>
                                                
                                             <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Site Phone Number</label>
                                                <input id="office_phone" name="office_phone" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->office_phone); ?>" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Address<span class="require">*</span></label>
                                                
                                            <textarea name="office_address" id="office_address" rows="6" class="form-control noscroll_textarea" required><?php echo e($setting['setting']->office_address); ?></textarea>
                                            </div>  
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Home Page Layout?</label>
                                                <select name="site_layout" class="form-control">
                                                <option value=""></option>
                                                <option value="" <?php if($setting['setting']->site_layout == ""): ?> selected <?php endif; ?>>Normal</option>
                                                <option value="tooltip" <?php if($setting['setting']->site_layout == "tooltip"): ?> selected <?php endif; ?>>Tooltip</option>
                                                </select>
                                                
                                                
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1">Footer Newsletter Content <span class="require">*</span></label>
                                                <input id="site_newsletter" name="site_newsletter" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_newsletter); ?>" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Google Analytics</label>
                                                <input id="google_analytics" name="google_analytics" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->google_analytics); ?>">
                                                <span>Example : UA-xxxxxx-1</span>
                                            </div>
                                            
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Multi Language?</label>
                                                <select name="multi_language" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->multi_language == "1"): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($setting['setting']->multi_language == "0"): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                                
                                                
                                            </div> 
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">New Registration For Email Verification?<span class="require">*</span></label><br/>                                         <select name="email_verification" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->email_verification == 1): ?> selected <?php endif; ?>>ON</option>
                                                        <option value="0" <?php if($setting['setting']->email_verification == 0): ?> selected <?php endif; ?>>OFF</option>
                                                        </select>
                                                        <small>(If selected "OFF" automatically verified customers / vendors)</small>
                                            </div>
                                            
                                           <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Manual Payment Verification?<span class="require">*</span></label><br/>                                         <select name="payment_verification" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->payment_verification == 1): ?> selected <?php endif; ?>>ON</option>
                                                        <option value="0" <?php if($setting['setting']->payment_verification == 0): ?> selected <?php endif; ?>>OFF</option>
                                                        </select>
                                                        <small>(If selected "OFF" users can download file immediately after payment without approval)</small>
                                            </div>
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Maintenance Mode?<span class="require">*</span></label><br/>                                         <select name="maintenance_mode" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->maintenance_mode == 1): ?> selected <?php endif; ?>>ON</option>
                                                        <option value="0" <?php if($setting['setting']->maintenance_mode == 0): ?> selected <?php endif; ?>>OFF</option>
                                                        </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Maintenance Mode Title</label>
                                                <input id="m_mode_title" name="m_mode_title" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->m_mode_title); ?>" <?php if($setting['setting']->maintenance_mode == 1): ?> required <?php endif; ?>>
                                                
                                            </div>
                                    </div>
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                             
                             <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                             
                             
                             <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1">Banner Heading <span class="require">*</span></label>
                                                <input id="site_banner_heading" name="site_banner_heading" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_banner_heading); ?>" required>
                                            </div>  
                                            
                              <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1">Banner Sub Heading <span class="require">*</span></label>
                                                <input id="site_banner_subheading" name="site_banner_subheading" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_banner_subheading); ?>" required>
                                            </div>              
                             
                             
                             <div class="form-group">
                                                <label for="site_favicon" class="control-label mb-1">Favicon (max 24 x 24)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_favicon" name="site_favicon" class="form-control-file" <?php if($setting['setting']->site_favicon == ''): ?> required <?php endif; ?>>
                                            <?php if($setting['setting']->site_favicon != ''): ?>
                                                <img height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_favicon); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Logo (size 180 x 50)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_logo" name="site_logo" class="form-control-file" <?php if($setting['setting']->site_logo == ''): ?> required <?php endif; ?>>
                                            <?php if($setting['setting']->site_logo != ''): ?>
                                                <img height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_logo); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Watermark?<span class="require">*</span></label>
                                                <select name="watermark_option" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1" <?php if($setting['setting']->watermark_option == "1"): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="0" <?php if($setting['setting']->watermark_option == "0"): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                                
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Watermark Image</label>
                                                
                                            <input type="file" id="site_watermark" name="site_watermark" class="form-control-file">
                                            <?php if($setting['setting']->site_watermark != ''): ?>
                                                <img height="150" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_watermark); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Primary Color (ex: #cccccc)<span class="require">*</span></label>
                                                <input id="site_primary_color" name="site_primary_color" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_primary_color); ?>" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Secondary Color (ex: #cccccc)<span class="require">*</span></label>
                                                <input id="site_secondary_color" name="site_secondary_color" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_secondary_color); ?>" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Button Color (ex: #cccccc)<span class="require">*</span></label>
                                                <input id="site_button_color" name="site_button_color" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_button_color); ?>" required>
                                            </div>
                                                
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">How Many Category Display On Menu? <span class="require">*</span></label>
                                                <input id="site_menu_category" name="site_menu_category" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_menu_category); ?>" required>
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Item, Review, Sale, Purchase Per Page <span class="require">*</span></label>
                                                <input id="site_item_per_page" name="site_item_per_page" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_item_per_page); ?>" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Post Per Page <span class="require">*</span></label>
                                                <input id="site_post_per_page" name="site_post_per_page" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_post_per_page); ?>" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Price range min price <span class="require">*</span></label>
                                                <input id="site_range_min_price" name="site_range_min_price" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_range_min_price); ?>" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Price range max price <span class="require">*</span></label>
                                                <input id="site_range_max_price" name="site_range_max_price" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_range_max_price); ?>" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Homepage Count Background (size 1920 x 350)<span class="require">*</span></label>
                                                
                                            <input type="file" id="site_count_bg" name="site_count_bg" class="form-control-file" <?php if($setting['setting']->site_count_bg == ''): ?> required <?php endif; ?>>
                                            <?php if($setting['setting']->site_count_bg != ''): ?>
                                                <img height="24" src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($setting['setting']->site_count_bg); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Homepage Newest Files Category Display Count <span class="require">*</span></label>
                                                <input id="site_category_newest_files" name="site_category_newest_files" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_category_newest_files); ?>" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Homepage Newest Files Display Count <span class="require">*</span></label>
                                                <input id="site_newest_files" name="site_newest_files" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_newest_files); ?>" required>
                                            </div>
                                            
                                           <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Flash Sale End Date <span class="require">*</span></label>
                                                <input id="site_flash_end_date" name="site_flash_end_date" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_flash_end_date); ?>" required>
                                            </div> 
                                            
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Free File End Date <span class="require">*</span></label>
                                                <input id="site_free_end_date" name="site_free_end_date" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->site_free_end_date); ?>" required>
                                            </div> 
                                            
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Blog<span class="require">*</span></label><br/>                                         <select name="site_blog_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->site_blog_display == 1): ?> selected <?php endif; ?>>ON</option>
                                                        <option value="0" <?php if($setting['setting']->site_blog_display == 0): ?> selected <?php endif; ?>>OFF</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label for="product_approval" class="control-label mb-1">Homepage Blog Post Display?<span class="require">*</span></label><br/>                                         <select name="home_blog_display" class="form-control" required>
                                                        <option value=""></option>
                                                        <option value="1" <?php if($setting['setting']->home_blog_display == 1): ?> selected <?php endif; ?>>ON</option>
                                                        <option value="0" <?php if($setting['setting']->home_blog_display == 0): ?> selected <?php endif; ?>>OFF</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1">Maintenance Mode Content</label>
                                                <input id="m_mode_content" name="m_mode_content" type="text" class="form-control noscroll_textarea" value="<?php echo e($setting['setting']->m_mode_content); ?>" <?php if($setting['setting']->maintenance_mode == 1): ?> required <?php endif; ?>>
                                                
                                            </div>
                                            
                                               
                                                 <input type="hidden" name="save_count_bg" value="<?php echo e($setting['setting']->site_count_bg); ?>">
                                                <input type="hidden" name="save_blog_adbanner" value="<?php echo e($setting['setting']->site_blog_adbanner); ?>">
                                                <input type="hidden" name="save_banner" value="<?php echo e($setting['setting']->site_banner); ?>">
                                                <input type="hidden" name="save_logo" value="<?php echo e($setting['setting']->site_logo); ?>">
                                                <input type="hidden" name="save_favicon" value="<?php echo e($setting['setting']->site_favicon); ?>">
                                                <input type="hidden" name="save_watermark" value="<?php echo e($setting['setting']->site_watermark); ?>">
                                                <input type="hidden" name="sid" value="1">
                             
                             
                             </div>
                                </div>

                            </div>
                             
                             
                             
                             </div>
                             
                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset </button>
                             </div>
                             
                             </div>
                             
                            
                            </form>
                            
                                                    
                                                    
                                                 
                            
                        </div> 

                     
                    
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/admin/general-settings.blade.php ENDPATH**/ ?>
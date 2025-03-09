<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(2862,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</head>

<body data-aos-easing="ease-in-out-sine" data-aos-duration="400" data-aos-delay="0">

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- <?php echo e(json_encode($allsettings)); ?> -->

<section class="bg-position-center-top" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_banner); ?>');">
    <div class="mb-lg-3 pb-4 pt-5">
        <div class="container">
            <div class="row mb-4 mb-sm-5">
                <div class="col-lg-7 col-md-9 text-center mx-auto">
                    <h1 class="text-white line-height-base"><?php echo e($allsettings->site_banner_heading); ?></h1>
                    <h2 class="h4 text-white font-weight-light"><?php echo e($allsettings->site_banner_subheading); ?></h2>
                </div>
            </div>
            <form action="<?php echo e(route('shop')); ?>" id="search_form" method="post" class="form-noborder searchbox" enctype="multipart/form-data" novalidate="novalidate">
            <?php echo e(csrf_field()); ?>

                <div class="row mb-4 mb-sm-5">
                    <div class="col-lg-8 col-md-10 mx-auto text-center">
                        <div class="input-group input-group-overlay input-group-lg">
                            <div class="input-group-prepend-overlay">
                                <span class="input-group-text"><i class="dwg-search"></i></span>
                            </div>
                            <input class="form-control form-control-lg prepended-form-control rounded-right-0" type="text" id="product_item" name="product_item" placeholder="<?php echo e(Helper::translation(3030,$translate)); ?>">               
                            <select name="category" class="cz-filter-search form-control form-control-lg appended-form-control" id="blah">
                                <option value=""></option>
                                <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="category_<?php echo e($menu->cat_id); ?>"><?php echo e($menu->category_name); ?></option>
                                    <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>"> - <?php echo e($sub_category->subcategory_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                            </select>
                            <button class="btn btn-outline-accent btn-lg font-size-base" type="submit" style="line-height:0px"><?php echo e(Helper::translation(3031,$translate)); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>



   
<?php if($allsettings->site_layout == ''): ?>
    <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(Helper::translation(3033,$translate)); ?></h2>
            <div class="pt-3 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
              <a class="btn btn-outline-accent" href="<?php echo e(URL::to('/shop/featured-items')); ?>"><?php echo e(Helper::translation(3032,$translate)); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>
        <div class="row pt-2 mx-n2">
            <?php $__currentLoopData = $featured['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- <?php echo e(json_encode($item)); ?>  -->
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                           
                           <a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item->item_id)); ?>/favorite/<?php echo e(base64_encode($item->item_liked)); ?>"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(url('/preview')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" target="_blank"><i class="dwg-cart"></i></a>
                            </div>
                            <a class="product-thumb-overlay" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"></a>
                            <?php if($item->item_preview!=''): ?>
                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_preview); ?>" alt="<?php echo e($item->item_name); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>">
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>"><?php echo e(str_replace('-',' ',$item->item_type)); ?></a>
                                </div>
                              
                                <div class="star-rating">
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                </div>
                            </div>

                            <h3 class="product-title font-size-sm mb-2">
                                <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><?php echo e(substr($item->item_name,0,20).'...'); ?></a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i><?php echo e($item->item_sold); ?><span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    <?php if($item->free_download == 1): ?>
                                        <del class="price-old"><?php echo e($allsettings->site_currency); ?><?php echo e($item->regular_price); ?></del>
                                        <span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                    <?php else: ?>
                                        <?php if($item->item_flash == 1): ?>
                                            <span class="flash"><?php echo e(round($item->regular_price/2)); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php else: ?>
                                            <span class="sales-color"><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php else: ?>

    <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
       <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(Helper::translation(3033,$translate)); ?></h2>
            <div class="pt-3 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
              <a class="btn btn-outline-accent" href="<?php echo e(URL::to('/shop/featured-items')); ?>"><?php echo e(Helper::translation(3032,$translate)); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>
                
        <div class="row pt-2 mx-n2">
            <?php $__currentLoopData = $featured['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">

                            <a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item->item_id)); ?>/favorite/<?php echo e(base64_encode($item->item_liked)); ?>"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(url('/preview')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" target="_blank"><i class="dwg-cart"></i></a>
                            </div>

                            <a class="product-thumb-overlay" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"></a>
                            <?php if($item->item_preview!=''): ?>
                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_preview); ?>" alt="<?php echo e($item->item_name); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>">
                            <?php endif; ?>
                
                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>"><?php echo e(str_replace('-',' ',$item->item_type)); ?></a>
                                </div>
                               

                                <div class="star-rating">
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                </div>
                            </div>

                            <h3 class="product-title font-size-sm mb-2">
                                <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><?php echo e(substr($item->item_name,0,20).'...'); ?></a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i><?php echo e($item->item_sold); ?><span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    <?php if($item->free_download == 1): ?>
                                        <del class="price-old"><?php echo e($allsettings->site_currency); ?><?php echo e($item->regular_price); ?></del>
                                        <span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                    <?php else: ?>
                                        <?php if($item->item_flash == 1): ?>
                                            <span class="flash"><?php echo e(round($item->regular_price/2)); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php else: ?>
                                            <span class="sales-color"><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <span class="tip">
                                <div class="row">
                                    <div class="col-md-12 align-items-center">
                                        <?php if($items->video_preview_type!=''): ?>
                                            <?php if($items->video_preview_type == 'youtube'): ?>
                                               <?php if($items->video_url != ''): ?>
                                                   <?php
                                                       $link = $items->video_url;
                                                       $video_id = explode("?v=", $link);
                                                       $video_id = $video_id[1];
                                                   ?>
                                                   <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>" frameborder="0" allow="autoplay" scrolling="no"></iframe> 
                                                <?php else: ?>
                                                   <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                <?php endif; ?>
                                             <?php endif; ?>

                                            <?php if($items->video_preview_type == 'mp4'): ?>
                                                <?php if($items->video_file != ''): ?>
                                                    <?php if($allsettings->site_s3_storage == 1): ?>
                                                        <?php $videofileurl = Storage::disk('s3')->url($items->video_file); ?>
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>             <?php else: ?>
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                   <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else: ?>  
                                            <?php if($items->item_preview!=''): ?>
                                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_preview); ?>" alt="<?php echo e($items->item_name); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($items->item_name); ?>">
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>   

                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <div class="titleitem"><?php echo e($items->item_name); ?></div>
                                            <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?><?php echo e($items->username); ?></span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="currrency">
                                                <?php if($items->free_download == 1): ?>
                                                    <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                <?php else: ?>
                                                    <span><?php echo e($items->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>


                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        </div>
    </section>
<?php endif; ?>
    
<section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
    <div class="container" id="demo">

        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(Helper::translation(3035,$translate)); ?><span class="highlighted"><?php echo e(Helper::translation(3003,$translate)); ?></span></h2>
            <div class="pt-3 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="<?php echo e(URL::to('/shop/featured-items')); ?>"><?php echo e(Helper::translation(3036,$translate)); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>
        
        <div id="demo" class="box jplist">
            <div class="jplist-panel box panel-top">                                           
                <div class="jplist-group sorting">
                    <ul>
                        <?php $__currentLoopData = $newest['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                        <li>
                            <a href="javascript:void(0);" data-control-type="button-text-filter"
                            data-control-action="filter"
                            data-control-name="<?php echo e($items->cat_id); ?>_category"
                            data-path=".block"
                            data-text="<?php echo e($items->cat_id); ?>_category" ><?php echo e($items->category_name); ?></a>
                        </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </ul>
                </div>
            </div>   


           
            <?php if($allsettings->site_layout == ''): ?>
                <div class="row list pt-2 mx-n2">
                    <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter list-item">
                            <div class="card product-card-alt">
                                <div class="product-thumb">

                                    <a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item->item_id)); ?>/favorite/<?php echo e(base64_encode($item->item_liked)); ?>"><i class="dwg-heart"></i></a>
                                    <div class="product-card-actions">
                                        <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><i class="dwg-eye"></i></a>
                                        <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(url('/preview')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" target="_blank"><i class="dwg-cart"></i></a>
                                    </div>
                                   
                                    <a class="product-thumb-overlay" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"></a>
                                    <?php if($item->item_preview!=''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_preview); ?>" alt="<?php echo e($item->item_name); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>">
                                    <?php endif; ?>
                                </div>
                                
                                <div class="card-body">
                                    <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                        <div class="text-muted font-size-xs mr-1">
                                            <a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>"><?php echo e(str_replace('-',' ',$item->item_type)); ?></a>
                                        </div>
                                        <?php
                                        if(count($item->ratings) != 0)
                                        {
                                        $top = 0;
                                        $bottom = 0;
                                        
                                        foreach($item->ratings as $view)
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


                                        <div class="star-rating">
                                            <?php if($count_rating == 0): ?>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            <?php endif; ?>
                                            <?php if($count_rating == 1): ?>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            <?php endif; ?>
                                            <?php if($count_rating == 2): ?>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            <?php endif; ?>
                                            <?php if($count_rating == 3): ?>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            <?php endif; ?>
                                            <?php if($count_rating == 4): ?>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                            <?php endif; ?>
                                            <?php if($count_rating == 5): ?>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <h3 class="product-title font-size-sm mb-2">
                                        <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><?php echo e(substr($item->item_name,0,20).'...'); ?></a>
                                    </h3>

                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="font-size-sm mr-2">
                                        <!--                                         
                                            <?php if($item->user_photo!=''): ?>
                                                <img width="30"  src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($item->user_photo); ?>" alt="<?php echo e($item->username); ?>" class="auth-img">
                                            <?php else: ?>
                                                <img width="30" src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($item->username); ?>" class="auth-img">
                                            <?php endif; ?>
                                            <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($item->username); ?>"><?php echo e($item->username); ?></a> 
                                        -->
                                        <i class="dwg-download text-muted mr-1"></i><?php echo e($item->item_sold); ?><span class="font-size-xs ml-1">Sales</span>
                                        </div>
                                        <div>
                                            <?php if($item->free_download == 1): ?>
                                                <del class="price-old"><?php echo e($allsettings->site_currency); ?><?php echo e($item->regular_price); ?></del>
                                                <span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                            <?php else: ?>
                                                <?php if($item->item_flash == 1): ?>
                                                    <span class="flash"><?php echo e(round($item->regular_price/2)); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                <?php else: ?>
                                                    <span class="sales-color"><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        

                                    </div>

                                </div>

                                <div class="block"> 
                               <span class="<?php echo e($item->item_category); ?>_<?php echo e($item->item_category_type); ?> display-none"><?php echo e($item->item_category); ?>_<?php echo e($item->item_category_type); ?></span>
                               </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                </div>
            <?php else: ?>

            <div class="row pt-2 mx-n2">
                <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list-item featured">
                        <a class="tip_trigger" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($items->item_slug); ?>/<?php echo e($items->item_id); ?>" title="<?php echo e($items->item_name); ?>" >
                            <?php if($items->item_thumbnail!=''): ?>
                                <img  src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_thumbnail); ?>" alt="<?php echo e($items->item_name); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($items->item_name); ?>">
                            <?php endif; ?>
                            <span class="tip">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <?php if($items->video_preview_type!=''): ?>

                                            <?php if($items->video_preview_type == 'youtube'): ?>
                                                <?php if($items->video_url != ''): ?>

                                                    <?php
                                                    $link = $items->video_url;
                                                    $video_id = explode("?v=", $link);
                                                    $video_id = $video_id[1];
                                                    ?>
                                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>" frameborder="0" allow="autoplay" scrolling="no"></iframe>        
                                                <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if($items->video_preview_type == 'mp4'): ?>
                                                <?php if($items->video_file != ''): ?>
                                                    <?php if($allsettings->site_s3_storage == 1): ?>
                                                        <?php $videofileurl = Storage::disk('s3')->url($items->video_file); 
                                                        ?>
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>             <?php else: ?>
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else: ?>  
                                            <?php if($items->item_preview!=''): ?>
                                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_preview); ?>" alt="<?php echo e($items->item_name); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($items->item_name); ?>">
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>    

                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <div class="titleitem"><?php echo e($items->item_name); ?></div>
                                            <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?> <?php echo e($items->username); ?></span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="currrency">
                                                <?php if($items->free_download == 1): ?>
                                                <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                <?php else: ?>
                                                <span><?php echo e($items->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>              
                        </a>

                        <div class="block"> 
                            <span class="<?php echo e($items->item_category); ?>_<?php echo e($items->item_category_type); ?> display-none"><?php echo e($items->item_category); ?>_<?php echo e($items->item_category_type); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
            <?php endif; ?>            
                
            <!--
            <div class="box jplist-no-results text-shadow align-center">
                <p>No results found</p>
            </div>-->
                        
        </div> 
    </div>
</section>

    
<section class="counter-up-area bgimage">
    <div class="bg_image_holder" style="background-image: url(<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_count_bg); ?>);opacity: 1;">
        <img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_count_bg); ?>" alt="">
    </div>
       
    <div class="container content_above">        
        <div class="col-md-12">
            <div class="counter-up">
                <div class="counter mcolor2">
                    <span class="lnr lnr-briefcase"></span>
                    <span class="count"><?php echo e($totalearning); ?></span> <span><?php echo e($allsettings->site_currency); ?></span>
                    <p><?php echo e(Helper::translation(3037,$translate)); ?></p>
                </div>
                <div class="counter mcolor3">
                    <span class="lnr lnr-cloud-download"></span>
                    <span class="count"><?php echo e($totalfiles); ?></span>
                    <p><?php echo e(Helper::translation(3038,$translate)); ?></p>
                </div>
                <div class="counter mcolor1">
                    <span class="lnr lnr-cart"></span>
                    <span class="count"><?php echo e($totalsales); ?></span>
                    <p><?php echo e(Helper::translation(3039,$translate)); ?></p>
                </div>
                <div class="counter mcolor4">
                    <span class="lnr lnr-users"></span>
                    <span class="count"><?php echo e($totalmembers); ?></span>
                    <p><?php echo e(Helper::translation(3002,$translate)); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
    


<?php if($allsettings->site_layout == ''): ?>
    <section class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(Helper::translation(3040,$translate)); ?></h2>
            <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="<?php echo e(URL::to('/free-items')); ?>"><?php echo e(Helper::translation(3041,$translate)); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>

        <div class="row pt-2 mx-n2">
        
            <?php $__currentLoopData = $free['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item->item_id)); ?>/favorite/<?php echo e(base64_encode($item->item_liked)); ?>"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(url('/preview')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" target="_blank"><i class="dwg-cart"></i></a>
                            </div>
                            
                            <a class="product-thumb-overlay" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"></a>
                            <?php if($item->item_preview!=''): ?>
                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_preview); ?>" alt="<?php echo e($item->item_name); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>">
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>"><?php echo e(str_replace('-',' ',$item->item_type)); ?></a>
                                </div>
                               

                                <div class="star-rating">
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                </div>
                            </div>

                            <h3 class="product-title font-size-sm mb-2">
                                <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><?php echo e(substr($item->item_name,0,20).'...'); ?></a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i><?php echo e($item->item_sold); ?><span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    <?php if($item->free_download == 1): ?>
                                        <del class="price-old"><?php echo e($allsettings->site_currency); ?><?php echo e($item->regular_price); ?></del>
                                        <span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                    <?php else: ?>
                                        <?php if($item->item_flash == 1): ?>
                                            <span class="flash"><?php echo e(round($item->regular_price/2)); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php else: ?>
                                            <span class="sales-color"><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php else: ?>
    <section class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100"><?php echo e(Helper::translation(3040,$translate)); ?></h2>
            <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="<?php echo e(URL::to('/free-items')); ?>"><?php echo e(Helper::translation(3041,$translate)); ?><i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>

        <div class="row pt-2 mx-n2">
            <?php $__currentLoopData = $free['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <a class="btn-wishlist btn-sm" href="<?php echo e(url('/item')); ?>/<?php echo e(base64_encode($item->item_id)); ?>/favorite/<?php echo e(base64_encode($item->item_liked)); ?>"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="<?php echo e(url('/preview')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>" target="_blank"><i class="dwg-cart"></i></a>
                            </div>
                            <a class="product-thumb-overlay" href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"></a>
                            <?php if($item->item_preview!=''): ?>
                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_preview); ?>" alt="<?php echo e($item->item_name); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($item->item_name); ?>">
                            <?php endif; ?>
                
                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>"><?php echo e(str_replace('-',' ',$item->item_type)); ?></a>
                                </div>
                               

                                <div class="star-rating">
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                    <i class="sr-star dwg-star"></i>
                                </div>
                            </div>

                            <h3 class="product-title font-size-sm mb-2">
                                <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><?php echo e(substr($item->item_name,0,20).'...'); ?></a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i><?php echo e($item->item_sold); ?><span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    <?php if($item->free_download == 1): ?>
                                        <del class="price-old"><?php echo e($allsettings->site_currency); ?><?php echo e($item->regular_price); ?></del>
                                        <span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                    <?php else: ?>
                                        <?php if($item->item_flash == 1): ?>
                                            <span class="flash"><?php echo e(round($item->regular_price/2)); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php else: ?>
                                            <span class="sales-color"><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <span class="tip">
                                <div class="row">
                                    <div class="col-md-12 align-items-center">
                                        <?php if($items->video_preview_type!=''): ?>
                                            <?php if($items->video_preview_type == 'youtube'): ?>
                                               <?php if($items->video_url != ''): ?>
                                                   <?php
                                                       $link = $items->video_url;
                                                       $video_id = explode("?v=", $link);
                                                       $video_id = $video_id[1];
                                                   ?>
                                                   <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist=<?php echo e($video_id); ?>" frameborder="0" allow="autoplay" scrolling="no"></iframe> 
                                                <?php else: ?>
                                                   <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                <?php endif; ?>
                                             <?php endif; ?>

                                            <?php if($items->video_preview_type == 'mp4'): ?>
                                                <?php if($items->video_file != ''): ?>
                                                    <?php if($allsettings->site_s3_storage == 1): ?>
                                                        <?php $videofileurl = Storage::disk('s3')->url($items->video_file); ?>
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e($videofileurl); ?>" type="video/mp4">Your browser does not support the video tag.</video>             <?php else: ?>
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->video_file); ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                   <img src="<?php echo e(url('/')); ?>/resources/views/assets/no-video.png" alt="<?php echo e($items->item_name); ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php else: ?>  
                                            <?php if($items->item_preview!=''): ?>
                                                <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($items->item_preview); ?>" alt="<?php echo e($items->item_name); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($items->item_name); ?>">
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>   

                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <div class="titleitem"><?php echo e($items->item_name); ?></div>
                                            <span class="authorr"><?php echo e(Helper::translation(3034,$translate)); ?><?php echo e($items->username); ?></span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="currrency">
                                                <?php if($items->free_download == 1): ?>
                                                    <span><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                <?php else: ?>
                                                    <span><?php echo e($items->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>


                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
    </section>
<?php endif; ?>

    
<section class="testimonial-area section--padding">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1><?php echo e(Helper::translation(3042,$translate)); ?>

                        <span class="highlighted"><?php echo e(Helper::translation(3043,$translate)); ?></span>
                    </h1>
                    <p><?php echo e(Helper::translation(3044,$translate)); ?></p>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">            
                <div class="testimonial-slider">
    
                    <?php $__currentLoopData = $review['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="testimonial">
                        <div class="testimonial__about">
                            <div class="avatar v_middle">
                                <a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($review->username); ?>">
                                <?php if($review->user_photo!=''): ?>
                                    <img  src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($review->user_photo); ?>" alt="<?php echo e($review->username); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo e(url('/')); ?>/public/img/no-user.png" alt="<?php echo e($review->username); ?>">
                                    <?php endif; ?>
                                    </a> 
                            </div>
                            <div class="name-designation v_middle">
                                <h4 class="name"><a href="<?php echo e(URL::to('/user')); ?>/<?php echo e($review->username); ?>"><?php echo e($review->username); ?></a></h4>
                                <span class="desig"><?php echo e($review->profile_heading); ?></span>
                                
                            </div>
                            <span class="quote-icon"><?php echo e($review->rating); ?><i class="lnr lnr-star"></i></span>
                        </div>
                        <div class="testimonial__text">
                            <p><?php echo e($review->rating_comment); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                </div>
            </div>
        </div>
    </div>
</section>
    

<?php if($allsettings->site_blog_display == 1): ?>
    <?php if($allsettings->home_blog_display == 1): ?>
    <section class="container pb-4 pb-md-5 homeblog" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">
                <?php echo e(Helper::translation(3045,$translate)); ?>

                <span class="highlighted"><?php echo e(Helper::translation(2877,$translate)); ?></span>
            </h2>
            
            <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="<?php echo e(URL::to('/blog')); ?>">
                    <?php echo e(__('Ream more posts')); ?><i class="dwg-arrow-right font-size-ms ml-1"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <?php $no = 1; ?>
            <?php $__currentLoopData = $blog['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 mb-2 py-3">
                    <div class="card">
                        <a class="blog-entry-thumb" href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" title="<?php echo e($post->post_title); ?>">
                            <?php if($post->post_image!=''): ?>
                                <img class="card-img-top" src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>" alt="<?php echo e($post->post_title); ?>">
                            <?php else: ?>
                                <img class="card-img-top" src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($post->post_title); ?>">
                             <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <h2 class="h6 blog-entry-title"><a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>"><?php echo e($post->post_title); ?></a></h2>
                            <p class="font-size-sm"><?php echo e(substr($post->post_short_desc,0,80).'...'); ?></p>
                            <div class="font-size-xs text-nowrap">
                                <span class="lnr lnr-clock"></span>
                                <span class="blog-entry-meta-link text-nowrap"><?php echo e(date('d F Y', strtotime($post->post_date))); ?></span>
                                <span class="blog-entry-meta-divider mx-2"></span>
                                <span class="blog-entry-meta-link text-nowrap">
                                    <i class="dwg-message"></i><?php echo e($comments->has($post->post_id) ? count($comments[$post->post_id]) : 0); ?>

                                </span>
                                <span class="blog-entry-meta-link text-nowrap">
                                    <i class="lnr lnr-eye"></i><?php echo e($post->post_view); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $no++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
     </section>
    <?php endif; ?>
<?php endif; ?>  


<section class="why_choose section--padding">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1><?php echo e(Helper::translation(3047,$translate)); ?>

                        <span class="highlighted"><?php echo e($allsettings->site_title); ?>?</span>
                        <p><h5><?php echo e(Helper::translation(3048,$translate)); ?></h5></p>
                    </h1>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="<?php echo e($allsettings->site_icon1); ?> theme-color"></span>
                        <h3 class="feature2-title"><?php echo e($allsettings->site_text1); ?></h3>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="<?php echo e($allsettings->site_icon2); ?> theme-color"></span>
                        <h3 class="feature2-title"><?php echo e($allsettings->site_text2); ?></h3>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="<?php echo e($allsettings->site_icon3); ?> theme-color"></span>
                        <h3 class="feature2-title"><?php echo e($allsettings->site_text3); ?></h3>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="<?php echo e($allsettings->site_icon4); ?> theme-color"></span>
                        <h3 class="feature2-title"><?php echo e($allsettings->site_text4); ?></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>   
    
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</body>

</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/index.blade.php ENDPATH**/ ?>
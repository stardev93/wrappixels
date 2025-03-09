<?php if($allsettings->maintenance_mode == 0): ?>
<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(Helper::translation(3178,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
    <?php echo $__env->make('stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dynamic-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="demo">

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
   

<div class="filter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filter-bar filter--bar2 jplist-panel">
                    <div class="pull-right">

                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select class="cz-filter-search form-control form-control-sm appended-form-control" data-control-type="sort-select" data-control-name="sort" data-control-action="sort">
                                    <option data-path=".like" data-order="asc" data-type="number"><?php echo e(Helper::translation(3179,$translate)); ?></option>
                                    <option data-path=".like" data-order="desc" data-type="number"><?php echo e(Helper::translation(3180,$translate)); ?></option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>
                                       
                        <div class="filter__option filter--select">
                            <div class="select-wrap">					
                                <select class="cz-filter-search form-control form-control-sm appended-form-control" data-control-type="sort-select" data-control-name="sort" data-control-action="sort">
                                    <option data-path=".popular-items" data-order="desc" data-type="number"><?php echo e(Helper::translation(3181,$translate)); ?></option>
                                    <option data-path=".new-items" data-order="desc" data-type="number"><?php echo e(Helper::translation(3182,$translate)); ?></option>
                                    <option data-path=".free-items" data-order="desc" data-type="number"><?php echo e(Helper::translation(3016,$translate)); ?></option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>						
                            </div>
                        </div>
                
                        <div class="filter__option filter--layout">
                            <a href="<?php echo e(URL::to('/shop')); ?>">
                                <div class="svg-icon">
                                    <img class="svg" src="<?php echo e(url('/')); ?>/public/assets/images/svg/grid.svg" alt="Grid View">
                                </div>
                            </a>
                            <a href="<?php echo e(URL::to('/shop-list')); ?>">
                                <div class="svg-icon">
                                    <img class="svg" src="<?php echo e(url('/')); ?>/public/assets/images/svg/list.svg" alt="List View">
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="products section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 ">
                <aside class="sidebar product--sidebar">
                    <div class="sidebar-card card--category">

                        <a class="card-title" href="#collapse1" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                            <h4><?php echo e(Helper::translation(2937,$translate)); ?>

                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse1">
                            <div class="jplist-panel">
                           					   
                                <div class="jplist-group" data-control-type="button-text-filter-group"
                                        data-control-action="filter"
                                        data-control-name="button-text-filter-group-1">
                                        
                                    <ul class="card-content">
                                        <?php $__currentLoopData = $getWell['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li style="list-style:none">
                                                <a href="javascript:void(0);">
                                                    <span
                                                        data-path=".<?php echo e($value->item_type_slug); ?>"
                                                        data-text="<?php echo e($value->item_type_slug); ?>"
                                                        data-button="true">
                                                        <span class="lnr lnr-chevron-right"></span>
                                                        <?php echo e($value->item_type_name); ?>

                                                        
                                                        <span class="item-count"></span>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                        
                    <div class="sidebar-card card--slider">
                        <a class="card-title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse3">
                            <h4><?php echo e(Helper::translation(3183,$translate)); ?>

                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content jplist-panel" id="collapse3">
                            <div class="card-content">
                                <div class="demo">
                                    <input type="text" id="amount" class="range-price" />
                                    <div id="slider-range">
                                    </div>
                                </div>
                                <div id="slider-range-min">
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        
            <!-- start col-md-9 -->
                
            <div class="col-lg-9 ">
                <?php if(count($itemData['item']) != 0): ?>
                    <div class="pt-2 mx-n2 row list items" id="listShow">        
                        <?php $__currentLoopData = $itemData['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-2 mb-grid-gutter col-lg-4 col-md-4 col-sm-6 list-item" data-price="<?php echo e($item->regular_price); ?>">
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
                                    
                                    <span class="new-items display-none"><?php echo e($item->item_id); ?></span>
                                    <span class="popular-items display-none"><?php echo e($item->item_liked); ?></span>
                                    <span class="free-items display-none"><?php echo e($item->free_download); ?></span>

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
                                            <!-- <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><?php echo e(substr($item->item_name,0,40).'...'); ?></a> -->
                                            <a href="<?php echo e(URL::to('/item')); ?>/<?php echo e($item->item_slug); ?>/<?php echo e($item->item_id); ?>"><?php echo e($item->item_name); ?></a>
                                        </h3>
                                        

                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <div class="font-size-sm mr-2">
                                                <i class="dwg-download text-muted mr-1"></i><?php echo e($item->download_count); ?><span class="font-size-xs ml-1">Sales</span>
                                            </div>
                                            <div>
                                                <?php if($item->free_download == 1): ?>
                                                    <del class="price-old"><?php echo e($allsettings->site_currency); ?><?php echo e($item->regular_price); ?></del>
                                                    <span class="price-badge rounded-sm py-1 px-2"><?php echo e(Helper::translation(2992,$translate)); ?></span>
                                                <?php else: ?>
                                                    <?php if($item->item_flash == 1): ?>
                                                        <span class="bg-faded-accent flash"><?php echo e(round($item->regular_price/2)); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                    <?php else: ?>
                                                        <span class="bg-faded-accent "><?php echo e($item->regular_price); ?> <?php echo e($allsettings->site_currency); ?></span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            <!-- <a href="<?php echo e(URL::to('/shop')); ?>/item-type/<?php echo e($item->item_type); ?>" class="theme-color">
                                                <span class="lnr lnr-book"></span>
                                                <?php echo e(str_replace('-',' ',$item->item_type)); ?>

                                            </a> -->

                                        </div>
                                        
                                    </div>
                                    <span class="<?php echo e($item->item_type); ?>" style="display:none;"><?php echo e($item->item_type); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                            
                        <div class="box jplist-no-results text-shadow align-center">
                            <p><?php echo e(Helper::translation(3184,$translate)); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <p><?php echo e(Helper::translation(3184,$translate)); ?></p>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
            <div class="jplist-panel box panel-top">						
                        
                    <div 
                        class="jplist-label customlable" 
                        data-type="Page {current} of {pages}" 
                        data-control-type="pagination-info" 
                        data-control-name="paging" 
                        data-control-action="paging">
                    </div>	

                    <div 
                        class="jplist-pagination" 
                        data-control-type="pagination" 
                        data-control-name="paging" 
                        data-control-action="paging"
                        data-items-per-page="<?php echo e($allsettings->site_item_per_page); ?>">
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
<?php endif; ?><?php /**PATH C:\xampp7.3.25\htdocs\wrappixels\resources\views/shop.blade.php ENDPATH**/ ?>
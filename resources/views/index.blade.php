@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2862,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    
</head>

<body data-aos-easing="ease-in-out-sine" data-aos-duration="400" data-aos-delay="0">

@include('header')

<!-- {{ json_encode($allsettings) }} -->

<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
    <div class="mb-lg-3 pb-4 pt-5">
        <div class="container">
            <div class="row mb-4 mb-sm-5">
                <div class="col-lg-7 col-md-9 text-center mx-auto">
                    <h1 class="text-white line-height-base">{{ $allsettings->site_banner_heading }}</h1>
                    <h2 class="h4 text-white font-weight-light">{{ $allsettings->site_banner_subheading }}</h2>
                </div>
            </div>
            <form action="{{ route('shop') }}" id="search_form" method="post" class="form-noborder searchbox" enctype="multipart/form-data" novalidate="novalidate">
            {{ csrf_field() }}
                <div class="row mb-4 mb-sm-5">
                    <div class="col-lg-8 col-md-10 mx-auto text-center">
                        <div class="input-group input-group-overlay input-group-lg">
                            <div class="input-group-prepend-overlay">
                                <span class="input-group-text"><i class="dwg-search"></i></span>
                            </div>
                            <input class="form-control form-control-lg prepended-form-control rounded-right-0" type="text" id="product_item" name="product_item" placeholder="{{ Helper::translation(3030,$translate) }}">               
                            <select name="category" class="cz-filter-search form-control form-control-lg appended-form-control" id="blah">
                                <option value=""></option>
                                @foreach($categories['menu'] as $menu)
                                    <option value="category_{{ $menu->cat_id }}">{{ $menu->category_name }}</option>
                                    @foreach($menu->subcategory as $sub_category)
                                    <option value="subcategory_{{$sub_category->subcat_id}}"> - {{ $sub_category->subcategory_name }}</option>
                                    @endforeach  
                                @endforeach     
                            </select>
                            <button class="btn btn-outline-accent btn-lg font-size-base" type="submit" style="line-height:0px">{{ Helper::translation(3031,$translate) }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>



   
@if($allsettings->site_layout == '')
    <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ Helper::translation(3033,$translate) }}</h2>
            <div class="pt-3 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
              <a class="btn btn-outline-accent" href="{{ URL::to('/shop/featured-items') }}">{{ Helper::translation(3032,$translate) }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>
        <div class="row pt-2 mx-n2">
            @foreach($featured['items'] as $item)
            <!-- {{ json_encode($item)}}  -->
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                           
                           <a class="btn-wishlist btn-sm" href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" target="_blank"><i class="dwg-cart"></i></a>
                            </div>
                            <a class="product-thumb-overlay" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"></a>
                            @if($item->item_preview!='')
                                <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}">
                            @endif
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}">{{ str_replace('-',' ',$item->item_type) }}</a>
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
                                <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ substr($item->item_name,0,20).'...' }}</a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i>{{ $item->item_sold}}<span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    @if($item->free_download == 1)
                                        <del class="price-old">{{ $allsettings->site_currency }}{{ $item->regular_price }}</del>
                                        <span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate) }}</span>
                                    @else
                                        @if($item->item_flash == 1)
                                            <span class="flash">{{ round($item->regular_price/2) }} {{ $allsettings->site_currency }}</span>
                                        @else
                                            <span class="sales-color">{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                
            @endforeach
        </div>
    </section>
@else

    <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
       <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ Helper::translation(3033,$translate) }}</h2>
            <div class="pt-3 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
              <a class="btn btn-outline-accent" href="{{ URL::to('/shop/featured-items') }}">{{ Helper::translation(3032,$translate) }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>
                
        <div class="row pt-2 mx-n2">
            @foreach($featured['items'] as $items)
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">

                            <a class="btn-wishlist btn-sm" href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" target="_blank"><i class="dwg-cart"></i></a>
                            </div>

                            <a class="product-thumb-overlay" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"></a>
                            @if($item->item_preview!='')
                                <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}">
                            @endif
                
                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}">{{ str_replace('-',' ',$item->item_type) }}</a>
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
                                <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ substr($item->item_name,0,20).'...' }}</a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i>{{ $item->item_sold}}<span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    @if($item->free_download == 1)
                                        <del class="price-old">{{ $allsettings->site_currency }}{{ $item->regular_price }}</del>
                                        <span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate) }}</span>
                                    @else
                                        @if($item->item_flash == 1)
                                            <span class="flash">{{ round($item->regular_price/2) }} {{ $allsettings->site_currency }}</span>
                                        @else
                                            <span class="sales-color">{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <span class="tip">
                                <div class="row">
                                    <div class="col-md-12 align-items-center">
                                        @if($items->video_preview_type!='')
                                            @if($items->video_preview_type == 'youtube')
                                               @if($items->video_url != '')
                                                   @php
                                                       $link = $items->video_url;
                                                       $video_id = explode("?v=", $link);
                                                       $video_id = $video_id[1];
                                                   @endphp
                                                   <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}" frameborder="0" allow="autoplay" scrolling="no"></iframe> 
                                                @else
                                                   <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                @endif
                                             @endif

                                            @if($items->video_preview_type == 'mp4')
                                                @if($items->video_file != '')
                                                    @if($allsettings->site_s3_storage == 1)
                                                        @php $videofileurl = Storage::disk('s3')->url($items->video_file); @endphp
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>             @else
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                    @endif
                                                @else
                                                   <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                @endif
                                            @endif
                                        @else  
                                            @if($items->item_preview!='')
                                                <img src="{{ url('/') }}/public/storage/items/{{ $items->item_preview }}" alt="{{ $items->item_name }}">
                                            @else
                                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $items->item_name }}">
                                            @endif
                                        @endif
                                    </div>
                                </div>   

                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <div class="titleitem">{{ $items->item_name }}</div>
                                            <span class="authorr">{{ Helper::translation(3034,$translate) }}{{ $items->username }}</span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="currrency">
                                                @if($items->free_download == 1)
                                                    <span>{{ Helper::translation(2992,$translate) }}</span>
                                                @else
                                                    <span>{{ $items->regular_price }} {{ $allsettings->site_currency }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>


                    </div>
                </div>
            @endforeach            
        </div>
    </section>
@endif
    
<section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
    <div class="container" id="demo">

        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ Helper::translation(3035,$translate) }}<span class="highlighted">{{ Helper::translation(3003,$translate) }}</span></h2>
            <div class="pt-3 aos-init aos-animate" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="{{ URL::to('/shop/featured-items') }}">{{ Helper::translation(3036,$translate) }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>
        
        <div id="demo" class="box jplist">
            <div class="jplist-panel box panel-top">                                           
                <div class="jplist-group sorting">
                    <ul>
                        @foreach($newest['items'] as $items)
                       
                        <li>
                            <a href="javascript:void(0);" data-control-type="button-text-filter"
                            data-control-action="filter"
                            data-control-name="{{ $items->cat_id }}_category"
                            data-path=".block"
                            data-text="{{ $items->cat_id }}_category" >{{ $items->category_name }}</a>
                        </li>

                        @endforeach   
                    </ul>
                </div>
            </div>   


           
            @if($allsettings->site_layout == '')
                <div class="row list pt-2 mx-n2">
                    @foreach($itemData['item'] as $item)
                    
                        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter list-item">
                            <div class="card product-card-alt">
                                <div class="product-thumb">

                                    <a class="btn-wishlist btn-sm" href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}"><i class="dwg-heart"></i></a>
                                    <div class="product-card-actions">
                                        <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"><i class="dwg-eye"></i></a>
                                        <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" target="_blank"><i class="dwg-cart"></i></a>
                                    </div>
                                   
                                    <a class="product-thumb-overlay" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"></a>
                                    @if($item->item_preview!='')
                                        <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}">
                                    @else
                                        <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}">
                                    @endif
                                </div>
                                
                                <div class="card-body">
                                    <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                        <div class="text-muted font-size-xs mr-1">
                                            <a class="product-meta font-weight-medium" href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}">{{ str_replace('-',' ',$item->item_type) }}</a>
                                        </div>
                                        @php
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
                                        @endphp


                                        <div class="star-rating">
                                            @if($count_rating == 0)
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            @endif
                                            @if($count_rating == 1)
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            @endif
                                            @if($count_rating == 2)
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            @endif
                                            @if($count_rating == 3)
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                                <i class="sr-star dwg-star"></i>
                                            @endif
                                            @if($count_rating == 4)
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star"></i>
                                            @endif
                                            @if($count_rating == 5)
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                                <i class="sr-star dwg-star-filled active"></i>
                                            @endif
                                        </div>
                                    </div>

                                    <h3 class="product-title font-size-sm mb-2">
                                        <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ substr($item->item_name,0,20).'...' }}</a>
                                    </h3>

                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="font-size-sm mr-2">
                                        <!--                                         
                                            @if($item->user_photo!='')
                                                <img width="30"  src="{{ url('/') }}/public/storage/users/{{ $item->user_photo }}" alt="{{ $item->username }}" class="auth-img">
                                            @else
                                                <img width="30" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $item->username }}" class="auth-img">
                                            @endif
                                            <a href="{{ URL::to('/user') }}/{{ $item->username }}">{{ $item->username }}</a> 
                                        -->
                                        <i class="dwg-download text-muted mr-1"></i>{{ $item->item_sold}}<span class="font-size-xs ml-1">Sales</span>
                                        </div>
                                        <div>
                                            @if($item->free_download == 1)
                                                <del class="price-old">{{ $allsettings->site_currency }}{{ $item->regular_price }}</del>
                                                <span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate) }}</span>
                                            @else
                                                @if($item->item_flash == 1)
                                                    <span class="flash">{{ round($item->regular_price/2) }} {{ $allsettings->site_currency }}</span>
                                                @else
                                                    <span class="sales-color">{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                                @endif
                                            @endif
                                        </div>
                                        

                                    </div>

                                </div>

                                <div class="block"> 
                               <span class="{{ $item->item_category }}_{{ $item->item_category_type }} display-none">{{ $item->item_category }}_{{ $item->item_category_type }}</span>
                               </div>

                            </div>
                        </div>
                    @endforeach  
                </div>
            @else

            <div class="row pt-2 mx-n2">
                @foreach($itemData['item'] as $items)
                    <div class="list-item featured">
                        <a class="tip_trigger" href="{{ URL::to('/item') }}/{{ $items->item_slug }}/{{ $items->item_id }}" title="{{ $items->item_name }}" >
                            @if($items->item_thumbnail!='')
                                <img  src="{{ url('/') }}/public/storage/items/{{ $items->item_thumbnail }}" alt="{{ $items->item_name }}">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $items->item_name }}">
                            @endif
                            <span class="tip">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        @if($items->video_preview_type!='')

                                            @if($items->video_preview_type == 'youtube')
                                                @if($items->video_url != '')

                                                    @php
                                                    $link = $items->video_url;
                                                    $video_id = explode("?v=", $link);
                                                    $video_id = $video_id[1];
                                                    @endphp
                                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}" frameborder="0" allow="autoplay" scrolling="no"></iframe>        
                                                @else
                                                    <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                @endif
                                            @endif

                                            @if($items->video_preview_type == 'mp4')
                                                @if($items->video_file != '')
                                                    @if($allsettings->site_s3_storage == 1)
                                                        @php $videofileurl = Storage::disk('s3')->url($items->video_file); 
                                                        @endphp
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>             @else
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                    @endif
                                                @else
                                                    <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                @endif
                                            @endif
                                        @else  
                                            @if($items->item_preview!='')
                                                <img src="{{ url('/') }}/public/storage/items/{{ $items->item_preview }}" alt="{{ $items->item_name }}">
                                            @else
                                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $items->item_name }}">
                                            @endif
                                        @endif
                                    </div>
                                </div>    

                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <div class="titleitem">{{ $items->item_name }}</div>
                                            <span class="authorr">{{ Helper::translation(3034,$translate) }} {{ $items->username }}</span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="currrency">
                                                @if($items->free_download == 1)
                                                <span>{{ Helper::translation(2992,$translate) }}</span>
                                                @else
                                                <span>{{ $items->regular_price }} {{ $allsettings->site_currency }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>              
                        </a>

                        <div class="block"> 
                            <span class="{{ $items->item_category }}_{{ $items->item_category_type }} display-none">{{ $items->item_category }}_{{ $items->item_category_type }}</span>
                        </div>
                    </div>
                @endforeach  
            </div>
            @endif            
                
            <!--
            <div class="box jplist-no-results text-shadow align-center">
                <p>No results found</p>
            </div>-->
                        
        </div> 
    </div>
</section>

    
<section class="counter-up-area bgimage">
    <div class="bg_image_holder" style="background-image: url({{ url('/') }}/public/storage/settings/{{ $allsettings->site_count_bg }});opacity: 1;">
        <img src="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_count_bg }}" alt="">
    </div>
       
    <div class="container content_above">        
        <div class="col-md-12">
            <div class="counter-up">
                <div class="counter mcolor2">
                    <span class="lnr lnr-briefcase"></span>
                    <span class="count">{{ $totalearning }}</span> <span>{{ $allsettings->site_currency }}</span>
                    <p>{{ Helper::translation(3037,$translate) }}</p>
                </div>
                <div class="counter mcolor3">
                    <span class="lnr lnr-cloud-download"></span>
                    <span class="count">{{ $totalfiles }}</span>
                    <p>{{ Helper::translation(3038,$translate) }}</p>
                </div>
                <div class="counter mcolor1">
                    <span class="lnr lnr-cart"></span>
                    <span class="count">{{ $totalsales }}</span>
                    <p>{{ Helper::translation(3039,$translate) }}</p>
                </div>
                <div class="counter mcolor4">
                    <span class="lnr lnr-users"></span>
                    <span class="count">{{ $totalmembers }}</span>
                    <p>{{ Helper::translation(3002,$translate) }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
    


@if($allsettings->site_layout == '')
    <section class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ Helper::translation(3040,$translate) }}</h2>
            <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="{{ URL::to('/free-items') }}">{{ Helper::translation(3041,$translate) }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>

        <div class="row pt-2 mx-n2">
        
            @foreach($free['items'] as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <a class="btn-wishlist btn-sm" href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" target="_blank"><i class="dwg-cart"></i></a>
                            </div>
                            
                            <a class="product-thumb-overlay" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"></a>
                            @if($item->item_preview!='')
                                <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}">
                            @endif
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}">{{ str_replace('-',' ',$item->item_type) }}</a>
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
                                <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ substr($item->item_name,0,20).'...' }}</a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i>{{ $item->item_sold}}<span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    @if($item->free_download == 1)
                                        <del class="price-old">{{ $allsettings->site_currency }}{{ $item->regular_price }}</del>
                                        <span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate) }}</span>
                                    @else
                                        @if($item->item_flash == 1)
                                            <span class="flash">{{ round($item->regular_price/2) }} {{ $allsettings->site_currency }}</span>
                                        @else
                                            <span class="sales-color">{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
@else
    <section class="container mb-lg-1 flash-sale" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">{{ Helper::translation(3040,$translate) }}</h2>
            <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="{{ URL::to('/free-items') }}">{{ Helper::translation(3041,$translate) }}<i class="dwg-arrow-right font-size-ms ml-1"></i></a>
            </div>
        </div>

        <div class="row pt-2 mx-n2">
            @foreach($free['items'] as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <a class="btn-wishlist btn-sm" href="{{ url('/item') }}/{{ base64_encode($item->item_id) }}/favorite/{{ base64_encode($item->item_liked) }}"><i class="dwg-heart"></i></a>
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"><i class="dwg-eye"></i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" target="_blank"><i class="dwg-cart"></i></a>
                            </div>
                            <a class="product-thumb-overlay" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"></a>
                            @if($item->item_preview!='')
                                <img src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}">
                            @else
                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}">
                            @endif
                
                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                                <div class="text-muted font-size-xs mr-1">
                                    <a class="product-meta font-weight-medium" href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}">{{ str_replace('-',' ',$item->item_type) }}</a>
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
                                <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ substr($item->item_name,0,20).'...' }}</a>
                            </h3>

                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="font-size-sm mr-2">
                                <i class="dwg-download text-muted mr-1"></i>{{ $item->item_sold}}<span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    @if($item->free_download == 1)
                                        <del class="price-old">{{ $allsettings->site_currency }}{{ $item->regular_price }}</del>
                                        <span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate) }}</span>
                                    @else
                                        @if($item->item_flash == 1)
                                            <span class="flash">{{ round($item->regular_price/2) }} {{ $allsettings->site_currency }}</span>
                                        @else
                                            <span class="sales-color">{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <span class="tip">
                                <div class="row">
                                    <div class="col-md-12 align-items-center">
                                        @if($items->video_preview_type!='')
                                            @if($items->video_preview_type == 'youtube')
                                               @if($items->video_url != '')
                                                   @php
                                                       $link = $items->video_url;
                                                       $video_id = explode("?v=", $link);
                                                       $video_id = $video_id[1];
                                                   @endphp
                                                   <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&autoplay=1&controls=0&showinfo=0&mute=1&loop=1&playlist={{ $video_id }}" frameborder="0" allow="autoplay" scrolling="no"></iframe> 
                                                @else
                                                   <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                @endif
                                             @endif

                                            @if($items->video_preview_type == 'mp4')
                                                @if($items->video_file != '')
                                                    @if($allsettings->site_s3_storage == 1)
                                                        @php $videofileurl = Storage::disk('s3')->url($items->video_file); @endphp
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>             @else
                                                        <video width="100%" height="200" autoplay controls loop muted><source src="{{ url('/') }}/public/storage/items/{{ $items->video_file }}" type="video/mp4">Your browser does not support the video tag.</video>
                                                    @endif
                                                @else
                                                   <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $items->item_name }}">
                                                @endif
                                            @endif
                                        @else  
                                            @if($items->item_preview!='')
                                                <img src="{{ url('/') }}/public/storage/items/{{ $items->item_preview }}" alt="{{ $items->item_name }}">
                                            @else
                                                <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $items->item_name }}">
                                            @endif
                                        @endif
                                    </div>
                                </div>   

                                <div class="row">
                                    <div class="col-md-8 text-left">
                                        <div class="titleitem">{{ $items->item_name }}</div>
                                            <span class="authorr">{{ Helper::translation(3034,$translate) }}{{ $items->username }}</span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="currrency">
                                                @if($items->free_download == 1)
                                                    <span>{{ Helper::translation(2992,$translate) }}</span>
                                                @else
                                                    <span>{{ $items->regular_price }} {{ $allsettings->site_currency }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>


                    </div>
                </div>
            @endforeach
            
        </div>
    </section>
@endif

    
<section class="testimonial-area section--padding">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>{{ Helper::translation(3042,$translate) }}
                        <span class="highlighted">{{ Helper::translation(3043,$translate) }}</span>
                    </h1>
                    <p>{{ Helper::translation(3044,$translate) }}</p>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12">            
                <div class="testimonial-slider">
    
                    @foreach($review['data'] as $review)
                    <div class="testimonial">
                        <div class="testimonial__about">
                            <div class="avatar v_middle">
                                <a href="{{ URL::to('/user') }}/{{ $review->username }}">
                                @if($review->user_photo!='')
                                    <img  src="{{ url('/') }}/public/storage/users/{{ $review->user_photo }}" alt="{{ $review->username }}">
                                    @else
                                    <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $review->username }}">
                                    @endif
                                    </a> 
                            </div>
                            <div class="name-designation v_middle">
                                <h4 class="name"><a href="{{ URL::to('/user') }}/{{ $review->username }}">{{ $review->username }}</a></h4>
                                <span class="desig">{{ $review->profile_heading }}</span>
                                
                            </div>
                            <span class="quote-icon">{{ $review->rating }}<i class="lnr lnr-star"></i></span>
                        </div>
                        <div class="testimonial__text">
                            <p>{{ $review->rating_comment }}</p>
                        </div>
                    </div>
                    @endforeach 

                </div>
            </div>
        </div>
    </div>
</section>
    

@if($allsettings->site_blog_display == 1)
    @if($allsettings->home_blog_display == 1)
    <section class="container pb-4 pb-md-5 homeblog" data-aos="fade-up" data-aos-delay="200">
        <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
            <h2 class="h3 mb-0 pt-3 mr-2" data-aos="fade-down" data-aos-delay="100">
                {{ Helper::translation(3045,$translate) }}
                <span class="highlighted">{{ Helper::translation(2877,$translate) }}</span>
            </h2>
            
            <div class="pt-3" data-aos="fade-down" data-aos-delay="100">
                <a class="btn btn-outline-accent" href="{{ URL::to('/blog') }}">
                    {{ __('Ream more posts') }}<i class="dwg-arrow-right font-size-ms ml-1"></i>
                </a>
            </div>
        </div>

        <div class="row">
            @php $no = 1; @endphp
            @foreach($blog['data'] as $post)
                <div class="col-lg-4 col-md-6 mb-2 py-3">
                    <div class="card">
                        <a class="blog-entry-thumb" href="{{ URL::to('/single') }}/{{ $post->post_slug }}" title="{{ $post->post_title }}">
                            @if($post->post_image!='')
                                <img class="card-img-top" src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}">
                            @else
                                <img class="card-img-top" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}">
                             @endif
                        </a>
                        <div class="card-body">
                            <h2 class="h6 blog-entry-title"><a href="{{ URL::to('/single') }}/{{ $post->post_slug }}">{{ $post->post_title }}</a></h2>
                            <p class="font-size-sm">{{ substr($post->post_short_desc,0,80).'...' }}</p>
                            <div class="font-size-xs text-nowrap">
                                <span class="lnr lnr-clock"></span>
                                <span class="blog-entry-meta-link text-nowrap">{{ date('d F Y', strtotime($post->post_date)) }}</span>
                                <span class="blog-entry-meta-divider mx-2"></span>
                                <span class="blog-entry-meta-link text-nowrap">
                                    <i class="dwg-message"></i>{{ $comments->has($post->post_id) ? count($comments[$post->post_id]) : 0 }}
                                </span>
                                <span class="blog-entry-meta-link text-nowrap">
                                    <i class="lnr lnr-eye"></i>{{ $post->post_view }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @php $no++; @endphp
            @endforeach
         </div>
     </section>
    @endif
@endif  


<section class="why_choose section--padding">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>{{ Helper::translation(3047,$translate) }}
                        <span class="highlighted">{{ $allsettings->site_title }}?</span>
                        <p><h5>{{ Helper::translation(3048,$translate) }}</h5></p>
                    </h1>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="{{ $allsettings->site_icon1 }} theme-color"></span>
                        <h3 class="feature2-title">{{ $allsettings->site_text1 }}</h3>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="{{ $allsettings->site_icon2 }} theme-color"></span>
                        <h3 class="feature2-title">{{ $allsettings->site_text2 }}</h3>
                    </div>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="{{ $allsettings->site_icon3 }} theme-color"></span>
                        <h3 class="feature2-title">{{ $allsettings->site_text3 }}</h3>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-3 col-md-3">
                <div class="feature2">
                    <div class="feature2__content">
                        <span class="{{ $allsettings->site_icon4 }} theme-color"></span>
                        <h3 class="feature2-title">{{ $allsettings->site_text4 }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>   
    
@include('footer')
    
@include('javascript')
    
</body>

</html>
@else
@include('503')
@endif
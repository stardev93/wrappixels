@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3178,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body>
@include('header')

<div id="demo">


<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
    <div class="container content_above mb-lg-3 pb-4 pt-5">
        <div class="row">
            <div class="col-md-8 offset-md-1">
                <div class="search">
                    <div class="search__title">
                        <h3 class="text-white line-height-base">
                            {{ $allsettings->site_banner_subheading }}
                        </h3>
                    </div>
                    <div class="search__field"> 
                        <div class="field-wrapper">
                            <input class="relative-field form-control form-control-lg prepended-form-control rounded-right-0 ui-autocomplete-input" data-path="*" 
                                type="text" 
                                value="" 
                                placeholder="Search your items"
                                data-control-type="textbox" 
                                data-control-name="title-filter" 
                                data-control-action="filter">
                        </div>     
                    </div>
                </div>
            </div>

            <div class="col-md-2 offset-md-1">
                <ul class="breadcrumb">
                    <li style="list-style:none;">
                        <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                    </li>
                    <li class="active" style="list-style:none;">
                        <a class="text-white line-height-base" href="{{ URL::to('/shop') }}">{{ Helper::translation(3025,$translate) }}</a>
                    </li>
                </ul>
            </div>

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
                                    <option data-path=".like" data-order="asc" data-type="number">{{ Helper::translation(3179,$translate) }}</option>
                                    <option data-path=".like" data-order="desc" data-type="number">{{ Helper::translation(3180,$translate) }}</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>
                                       
                        <div class="filter__option filter--select">
                            <div class="select-wrap">					
                                <select class="cz-filter-search form-control form-control-sm appended-form-control" data-control-type="sort-select" data-control-name="sort" data-control-action="sort">
                                    <option data-path=".popular-items" data-order="desc" data-type="number">{{ Helper::translation(3181,$translate) }}</option>
                                    <option data-path=".new-items" data-order="desc" data-type="number">{{ Helper::translation(3182,$translate) }}</option>
                                    <option data-path=".free-items" data-order="desc" data-type="number">{{ Helper::translation(3016,$translate) }}</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>						
                            </div>
                        </div>
                
                        <div class="filter__option filter--layout">
                            <a href="{{ URL::to('/shop') }}">
                                <div class="svg-icon">
                                    <img class="svg" src="{{ url('/') }}/public/assets/images/svg/grid.svg" alt="Grid View">
                                </div>
                            </a>
                            <a href="{{ URL::to('/shop-list') }}">
                                <div class="svg-icon">
                                    <img class="svg" src="{{ url('/') }}/public/assets/images/svg/list.svg" alt="List View">
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
                            <h4>{{ Helper::translation(2937,$translate) }}
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse1">
                            <div class="jplist-panel">						    
                                <div class="jplist-group"
                                    data-control-type="button-text-filter-group"
                                    data-control-action="filter"
                                    data-control-name="button-text-filter-group-1">
                                    <ul class="card-content">
                                        @foreach($getWell['type'] as $value)
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span
                                                    data-path=".{{ $value->item_type_slug }}"
                                                    data-text="{{ $value->item_type_slug }}"
                                                    data-button="true">
                                                    
                                                        <span class="lnr lnr-chevron-right"></span>{{ $value->item_type_name }}
                                                        <span class="item-count"></span>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="sidebar-card card--slider">
                        <a class="card-title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse3">
                            <h4>{{ Helper::translation(3183,$translate) }}
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content jplist-panel" id="collapse3">
                            <div class="card-content">
                                <div class="demo">
                                    <input type="text" id="amount" class="range-price" />
                                <div id="slider-range"></div>
                            </div>    
                            <div id="slider-range-min"></div>
                        </div>
                    </div>

                </div>
            </aside>

        </div>

        <div class="col-lg-9">

            @if(count($itemData['item']) != 0)
                <div class="list items" id="listShow">
                    @foreach($itemData['item'] as $item)
                        <div class="product product--list product--list-small  li-item list-item product-card-alt" data-price="{{ $item->regular_price }}">
                            <div class="product-thumb product__thumbnail" style="background:none !imortant; background-color:none !imortant">
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

                            <div class="product__details">
                                <div class="product-desc">
                                    
                                    <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="product_title">
                                        <h4 class="title">{{ substr($item->item_name,0,30).'...' }}</h4>
                                        </a>
                                    <p>{{ substr($item->item_shortdesc,0,60).'...' }}</p>

                                    <ul class="titlebtm">
                                        <li class="product_cat">
                                            <a href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}" class="theme-color product-meta font-weight-medium">
                                                <span class="lnr lnr-book"></span>{{ str_replace('-',' ',$item->item_type) }}</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-meta">
                                    <div class="author">
                                        @if($item->user_photo!='')
                                            <img  src="{{ url('/') }}/public/storage/users/{{ $item->user_photo }}" alt="{{ $item->username }}" class="auth-img">
                                        @else
                                            <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $item->username }}" class="auth-img">
                                        @endif
                                        <p>
                                            <a href="{{ URL::to('/user') }}/{{ $item->username }}">{{ $item->username }}</a>
                                        </p>
                                    </div>

                                    <div class="love-comments">
                                        <p>
                                            <span class="lnr lnr-heart"></span> {{ $item->item_liked }} likes
                                        </p>
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

                                    <div class="rating product--rating">
                                        <ul>
                                            @if($count_rating == 0)
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
                                            @endif 
                                            @if($count_rating == 1)
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
                                            @endif 
                                            @if($count_rating == 2)
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
                                            @endif
                                            @if($count_rating == 3)
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
                                            @endif
                                            @if($count_rating == 4)
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
                                            @endif
                                            @if($count_rating == 5)
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
                                            @endif          
                                        </ul>
                                        
                                    </div>
                                </div>

           
                                <span class="new-items display-none">{{ $item->item_id }}</span>
                                    <span class="popular-items display-none">{{ $item->item_liked }}</span>
                                    <span class="free-items display-none">{{ $item->free_download }}</span>
                                <div class="product-purchase">
                                    <div class="price_love">
                                        @if($item->free_download == 1)
                                            <del class="price-old">{{ $allsettings->site_currency }}{{ $item->regular_price }}</del>
                                            <span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate) }}</span>
                                        @else
                                            <span class="bg-faded-accent">{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                        @endif
                                    </div>
                                    <div class="sell font-size-sm">
                                        <p>
                                            <!-- <span class="lnr lnr-cart"></span>
                                            <span>{{ $item->item_sold }}</span> -->
                                            <i class="dwg-download text-muted mr-1"></i>{{ $item->item_sold}}  <span class="font-size-xs ml-1">Sales</span>
                                        </p>
                                    </div>
                                   
                                    <span class="{{ $item->item_type }}" style="display:none;">{{ $item->item_type }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                    <div class="box jplist-no-results text-shadow align-center">
                        <p>{{ Helper::translation(3184,$translate) }}</p>
                    </div>
                </div>
            @else
                <p>{{ Helper::translation(3184,$translate) }}</p>
            @endif
            
            
            
            
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
                        data-items-per-page="{{ $allsettings->site_item_per_page }}">
                    </div>			
                    
                </div>
            </div>
        </div>
           
    </div>
      
</section>
   
</div>
   
    @include('footer')    
    @include('javascript')

</body>
</html>
@else
    @include('503')
@endif
@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3016,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload term-condition-page">

    @include('header')
    
<section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}');">
    <div class="container">
        <div class="row jplist-panel">
                <div class="col-md-8 offset-md-2 pb-4 pt-5">
                    <div class="search">
                        <div class="col-lg-9 col-md-12 text-center mx-auto pb-4">
                            <h3 class="text-white line-height-base">{{ Helper::translation(3016,$translate) }}</h3>
                            <h4 class="h4 text-white font-weight-light">{{ Helper::translation(3017,$translate) }}</h4>
                        </div>
                        <div class="countdown-timer">
                            <ul id="example">
                            <li class="pt-2 pb-1 mb-2"><span class="days">00</span><div>{{ Helper::translation(2995,$translate) }}</div></li>
                            <li class="pt-2 pb-1 mb-2"><span class="hours">00</span><div>{{ Helper::translation(2996,$translate) }}</div></li>
                            <li class="pt-2 pb-1 mb-2"><span class="minutes">00</span><div>{{ Helper::translation(2997,$translate) }}</div></li>
                            <li class="pt-2 pb-1 mb-2"><span class="seconds">00</span><div>{{ Helper::translation(2998,$translate) }}</div></li>
                        </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
</section>



<section class="products section--padding2" data-aos="fade-up" data-aos-delay="200">
    <div class="container" id="demo">

        <div class="row pt-2 mx-n2">
            @foreach($itemData['item'] as $item)
            
                <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <div class="product-card-actions">
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ Helper::translation(2999,$translate) }}</i></a>
                                <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ url('/preview') }}/{{ $item->item_slug }}/{{ $item->item_id }}" target="_blank">{{ Helper::translation(3000,$translate) }}</a>
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
                                <i class="dwg-download text-muted mr-1"></i>{{ $item->download_count}}<span class="font-size-xs ml-1">Sales</span>
                                </div>
                                <div>
                                    @if($item->free_download == 1)
                                        <del class="price-old">{{ $allsettings->site_currency }}{{ $item->regular_price }}</del>
                                        <span class="price-badge rounded-sm py-1 px-2">{{ Helper::translation(2992,$translate) }}</span>
                                    @else
                                        @if($item->item_flash == 1)
                                            <span class="flash">{{ round($item->regular_price/2) }} {{ $allsettings->site_currency }}</span>
                                        @else
                                            <span>{{ $item->regular_price }} {{ $allsettings->site_currency }}</span>
                                        @endif
                                    @endif
                                </div>
                                

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach  
        </div>
                   
        </div> 
    </div>
</section>



@include('footer')
    
@include('javascript')
  
@if(!empty($allsettings->site_free_end_date))
	<script type="text/javascript">
            $('#example').countdown({
                date: '{{ date("m/d/Y H:i:s", strtotime($allsettings->site_free_end_date)) }}',
                offset: -8,
                day: 'Day',
                days: 'Days'
            }, function () {
                
            });
    </script>
@endif 
</body>

</html>
@else
    @include('503')
@endif
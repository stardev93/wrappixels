@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@if(Auth::user()->user_type == 'vendor') {{ Helper::translation(2932,$translate) }} @else {{ Helper::translation(2860,$translate) }} @endif - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload dashboard-edit">

    
   @include('header') 
   @if(Auth::user()->user_type == 'vendor')

   <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ Helper::translation(2932,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/manage-item') }}">{{ Helper::translation(2932,$translate) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="dashboard-area">

        <div class="dashboard_contents">
            <div class="container">
                <div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <span class="alert_icon lnr lnr-checkmark-circle"></span>
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <span class="alert_icon lnr lnr-warning"></span>
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="lnr lnr-cross" aria-hidden="true"></span>
                        </button>
                    </div>
                    @endif
        
                    @if (!$errors->isEmpty())
                        <div class="alert alert-danger" role="alert">
                            <span class="alert_icon lnr lnr-warning"></span>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                    @endif
                    
                </div>
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-right mb-3">
                        <button onClick="myFunction()" class="btn btn-outline-accent dropbtn">
                            <i class="lnr lnr-plus-circle"></i> {{ Helper::translation(2931,$translate) }}
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            @foreach($viewitem['type'] as $item_type)
                            @php $encrypted = $encrypter->encrypt($item_type->item_type_id); @endphp
                            <a href="{{ URL::to('/upload-item') }}/{{ $encrypted }}">{{ $item_type->item_type_name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row" id="listShow">
                    @foreach($itemData['item'] as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6 px-2 mb-grid-gutter li-item">
                        @if($item->item_status == 0)<div class="ribbon"><span>{{ Helper::translation(3092,$translate) }}</span></div>@endif
                    
                        <div class="card product-card-alt">
                            <div class="product-thumb">

                                <div class="product-card-actions">
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/edit-item') }}/{{ $item->item_token }}"><span class="lnr lnr-pencil"></span>{{ Helper::translation(2923,$translate) }}</a>
                                    <a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="{{ URL::to('/manage-item') }}/{{ $encrypted }}" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');"><span class="lnr lnr-trash"></span>{{ Helper::translation(2924,$translate) }}</a>
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
                                        @if($item->item_status == 1)
                                            <a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}" class="product_title ellipsis">
                                        @else
                                            <span class="product_title ellipsis">
                                        @endif
                                        <h4>{{ $item->item_name }}</h4>
                                        @if($item->item_status == 1)
                                            </a>
                                        @else
                                            </span>
                                        @endif
                                    </div>                                        
                                </div>

                                <h3 class="product-title font-size-sm mb-2">
                                {{ substr($item->item_shortdesc,0,120).'...' }}
                                </h3>

                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="font-size-sm mr-2">
                                        <i class="dwg-download text-muted mr-1"></i>{{ $item->item_sold }}<span class="font-size-xs ml-1">Sales</span>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-area">
                           <div class="turn-page" id="pager"></div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

    @else
    @include('not-found')
    @endif
    
   @include('footer')
    
   @include('javascript')
   
</body>

</html>
@else
@include('503')
@endif
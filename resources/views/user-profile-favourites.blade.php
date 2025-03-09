@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3200,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload author-followers">

    @include('header')

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="topbar-text dropdown d-md-none">
                <!-- <div class="container d-lg-flex justify-content-between py-2 py-lg-3" style="padding-bottom: 2rem !important;"> -->
                <div class="container d-lg-flex justify-content-between py-lg-3" style="padding-bottom: 2rem !important;">
                    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                                <li class="breadcrumb-item">
                                    <a class="text-nowrap" href="{{ URL::to('/') }}">
                                        <i class="dwg-home"></i>{{ Helper::translation(2862,$translate) }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item text-nowrap active" aria-current="page">{{ Helper::translation(2926,$translate) }}</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
                        <h1 class="h3 mb-0 text-white">{{ Helper::translation(2926,$translate) }}</h1>
                    </div>

                </div>
            </div>

            <div class="topbar-text text-nowrap d-none d-md-inline-block col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h1 class="text-white line-height-base">
                        {{ Helper::translation(2926,$translate) }}
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 offset-md-1">
                        <ul class="breadcrumb">
                            <li style="list-style:none;">
                                <a class="text-white line-height-base" href="{{ URL::to('/') }}"><i class="dwg-home"></i>{{ Helper::translation(2862,$translate) }} / </a>
                            </li>
                            <li class="text-white line-height-base" aria-current="page">{{ Helper::translation(2926,$translate) }}</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

 
    <div class="container mb-5 pb-3" style="margin-top:-3.5rem">
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

        <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
            <div class="row">
                <!-- Sidebar-->
                <aside class="col-lg-4">
                    <!-- Account menu toggler (hidden on screens larger 992px)-->
                    <div class="d-block d-lg-none p-4">
                        <a class="btn btn-outline-accent d-block" href="#account-menu" data-toggle="collapse"><i class="dwg-menu mr-2"></i>Account menu</a>
                    </div>
                        <!-- Actual menu-->
                    <div class="cz-sidebar-static rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0">
                        <div class="px-4 mb-4">
                            <div class="media align-items-center">
                                <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;">
                                    @if($user['user']->user_photo != '')
                                        <img class="rounded-circle" src="{{ url('/') }}/public/storage/users/{{ $user['user']->user_photo }}" alt="{{ $user['user']->username }}">
                                        @else
                                        <img class="rounded-circle" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $user['user']->username }}">
                                    @endif    
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="font-size-base mb-0">{{ $user['user']->username }}</h3><span class="text-accent font-size-sm">{{ $user['user']->email }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-secondary px-4 py-3">
                            <h3 class="font-size-sm mb-0 text-muted">Account</h3>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ url('/user-profile') }}/{{ $user['user']->username }}"><i class="dwg-settings opacity-60 mr-2"></i>{{ Helper::translation(2926,$translate) }}</a></li>
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-purchases') }}/{{ $user['user']->username }}"><i class="dwg-basket opacity-60 mr-2"></i>{{ Helper::translation(3024,$translate) }}</a></li>
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-favourites') }}/{{ $user['user']->username }}"><i class="dwg-heart opacity-60 mr-2"></i>{{ Helper::translation(2929,$translate) }}</a></li>
                            <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ URL::to('/user-withdrawals') }}/{{ $user['user']->username }}"><i class="dwg-currency-exchange opacity-60 mr-2"></i>{{ Helper::translation(2933,$translate) }}</a></li>
                            <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{ url('/logout') }}"><i class="dwg-sign-out opacity-60 mr-2"></i>{{ Helper::translation(3023,$translate) }}</a></li>
                        </ul>
                    </div>          
                </aside>
                <!-- Content-->
                <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
                    <div class="pt-2 px-4 pl-lg-0 pr-xl-5">
                        <h2 class="h3 pt-2 pb-4 mb-0 text-center text-sm-left border-bottom">{{ Helper::translation(2989,$translate) }}<span class="badge badge-secondary font-size-sm text-body align-middle ml-2">{{count($fav['item'])}}</span></h2>
                        <!-- Product-->
                        @foreach($fav['item'] as $item)

                            <div class="media d-block d-sm-flex align-items-center py-4 border-bottom">
                                <a class="d-block position-relative mb-3 mb-sm-0 mr-sm-4 mx-auto cart-img" href="{{ url('/favourites') }}/{{ base64_encode($item->fav_id) }}/{{ base64_encode($item->item_id) }}" id="drop1" onClick="return confirm('{{ Helper::translation(2991,$translate) }}');">
                                    @if($item->item_preview!='')
                                        <img class="rounded-lg" src="{{ url('/') }}/public/storage/items/{{ $item->item_preview }}" alt="{{ $item->item_name }}">
                                    @else
                                        <img class="rounded-lg" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->item_name }}" class="item-thumbnail">
                                    @endif

                                    <span class="close-floating" data-toggle="tooltip" title="Remove from Favorites"><i class="dwg-close"></i></span>
                                </a>
                               
                                <div class="media-body text-center text-sm-left">
                                    <h3 class="h6 product-title mb-2"><a href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">{{ $item->item_name }}</a></h3>
                                    <div class="d-inline-block text-accent">
                                        @if($item->user_photo!='')
                                            <img class="border-left"  src="{{ url('/') }}/public/storage/users/{{ $item->user_photo }}" alt="{{ $item->username }}" style="width:30px; height:30px;border-radius: 50%;">
                                        @else
                                            <img class="border-left" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $item->username }}" style="width:30px; height:30px;border-radius: 50%;">
                                        @endif
                                        <a href="{{ URL::to('/user') }}/{{ $item->username }}">{{ $item->username }}</a>
                                    </div>

                                    <div class="d-inline-block text-accent  font-size-ms border-left ml-2 pl-2">
                                        @if($item->free_download == 1)
                                            {{ Helper::translation(2992,$translate) }}
                                        @else
                                            {{ $item->regular_price }} {{ $allsettings->site_currency }}
                                        @endif
                                    </div>
                                    <a class="d-inline-block text-accent font-size-ms border-left ml-2 pl-2" href="{{ URL::to('/shop') }}/item-type/{{ $item->item_type }}">
                                        {{ $item->item_type }}
                                    </a>

                                    

                                    <div class="form-inline pt-2">
                                        {{ substr($item->item_shortdesc,0,120).'...' }}
                                        <a class="btn btn-primary btn-sm mx-auto mx-sm-0 my-2" href="{{ URL::to('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}"><i class="dwg-cart mr-1"></i>View Product</a>
                            
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                </section>
            </div>
        </div>
    </div>
 
  
    
    
   @include('footer')
    
   @include('javascript')
</body>

</html>
@else
@include('503')
@endif
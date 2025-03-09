@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(2885,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload cart-page">

   
   @include('header')

   <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-white line-height-base">
                    {{ Helper::translation(2885,$translate) }}
                    </h1>
                </div>

                <div class="col-md-2 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/cart') }}">{{ Helper::translation(2885,$translate) }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
  
    <section class="cart_area section--padding2 bgcolor">
        <div class="container">
            
            <div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <span class="alert_icon lnr lnr-checkmark-circle"></span>
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                    </div>
                @endif
            
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <span class="alert_icon lnr lnr-warning"></span>
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                    </div>
                @endif
            
                @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    @foreach ($errors->all() as $error)
                     
                        {{ $error }}

                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="lnr lnr-cross" aria-hidden="true"></span></button>
                </div>
                @endif
            </div>

           <form action="{{ route('coupon') }}" class="setting_form" id="coupon_form" method="post" enctype="multipart/form-data">
           {{ csrf_field() }} 
            <div class="row">
                <div class="col-md-12">
                    <div class="product_archive added_to__cart">
                        <div class="title_area">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>{{ Helper::translation(2886,$translate) }}</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="add_info">{{ Helper::translation(2887,$translate) }}</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>{{ Helper::translation(2888,$translate) }}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>{{ Helper::translation(2889,$translate) }}</h4>
                                </div>
                            </div>
                        </div>
                        @if($cart_count != 0)
                        <div class="row">
                        @php 
                        $subtotal = 0;
                        $coupon_code = ""; 
                        $new_price = 0;
                        @endphp
                        @foreach($cart['item'] as $cart)
                            <div class="col-md-12">
                                <div class="single_product clearfix">
                                    <div class="col-lg-4 col-md-7 v_middle">
                                        <div class="product__description">
                                        <a href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}">
                                            @if($cart->item_thumbnail!='')
                                            <img src="{{ url('/') }}/public/storage/items/{{ $cart->item_thumbnail }}" alt="{{ $cart->item_name }}" class="cart-thumb">
                                            @else
                                            <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $cart->item_name }}" class="cart-thumb">
                                            @endif
                                            </a>
                                            <div class="short_desc">
                                                <a href="{{ url('/item') }}/{{ $cart->item_slug }}/{{ $cart->item_id }}">
                                                    <h4>{{ $cart->item_name }} </h4>
                                                </a>
                                                <!--<p>Nunc placerat mi id nisi inter dum mollis. Praesent phare...</p>-->
                                            </div>
                                        </div>
                                        <!-- end /.product__description -->
                                    </div>
                                    <!-- end /.col-md-5 -->

                                    <div class="col-lg-3 col-md-2 v_middle">
                                        <div class="product__additional_info">
                                            <ul>
                                                <li>
                                                    {{ $cart->license }}
                                                    @if($cart->license == 'regular') 
                                                        ({{ Helper::translation(2890,$translate) }}) 
                                                    @elseif($cart->license == 'extended') 
                                                        ({{ Helper::translation(2891,$translate) }}) 
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end /.product__additional_info -->
                                    </div>
                                    <!-- end /.col-md-3 -->
                                    @php
                                      if($cart->discount_price != 0)
                                      {
                                        $price = $cart->discount_price;
                                        $new_price += $cart->discount_price;
                                        $coupon_code = $cart->coupon_code;
                                        
                                      }
                                      else
                                      {
                                        $price = $cart->item_price;
                                        $new_price += $cart->item_price;
                                        
                                      }
                                    @endphp 
                                    <div class="col-lg-3 col-md-3 v_middle">
                                        <div class="product__price_download">
                                            <div class="item_price v_middle">
                                                @if($cart->discount_price != 0)
                                                <span>{{ $price }} {{ $allsettings->site_currency }}</span>
                                                @endif
                                                <span @if($cart->discount_price != 0) class="cross-line" @endif>{{ $cart->item_price }} {{ $allsettings->site_currency }}</span>
                                            </div>
                                            
                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-3 v_middle">
                                        <div class="product__price_download" align="center">
                                            
                                            <div class="item_action v_middle">
                                                <a href="{{ url('/cart') }}/{{ base64_encode($cart->ord_id) }}" class="" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');">
                                                    <span class="lnr lnr-trash remove_carrt"></span>
                                                </a>
                                            </div>
                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>
                                    
                                    
                                    <!-- end /.col-md-4 -->
                                </div>
                                <!-- end /.single_product -->
                            </div>
                            @php $subtotal += $cart->item_price; @endphp
                           @endforeach
                            
                        </div>
                        <!-- end /.row -->

                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="cart_calculation">
                                <div class="cart--subtotal">
                                        <p class="coupon-block">
                                   <input type="text" class="form-control coupon-text" id="coupon" name="coupon" value="" required><button type="submit" class="btn btn--sm btn-outline-accent">{{ Helper::translation(2893,$translate) }}</button></p>
                                    </div>
                                    <div class="cart--subtotal">
                                        <p>
                                            <span>{{ Helper::translation(2894,$translate) }}</span>{{ $subtotal }} {{ $allsettings->site_currency }}</p>
                                    </div>
                                    @if($coupon_code != "")
                                    @php 
                                    $coupon_discount = $subtotal - $new_price;
                                    $final = $new_price; 
                                    @endphp 
                                    <div class="cart--subtotal">
                                        <p>
                                            <span>{{ Helper::translation(2895,$translate) }}</span><span class="fs14 green">( {{ Helper::translation(2866,$translate) }} : <strong>{{ $coupon_code }}</strong> )<a href="{{ URL::to('/cart/') }}/remove/{{ $coupon_code }}" class="red fs14" onClick="return confirm('{{ Helper::translation(2892,$translate) }}');" title="Remove"> <i class="fa fa-remove"></i> </a></span>{{ $coupon_discount }} {{ $allsettings->site_currency }}</p>
                                    </div>
                                    @else
                                    @php $final = $subtotal; @endphp
                                    @endif
                                    <div class="cart--total">
                                        <p>
                                            <span>{{ Helper::translation(2896,$translate) }}</span>{{ $final }} {{ $allsettings->site_currency }}</p>
                                    </div>

                                    <a href="{{ url('/checkout') }}" class="btn btn--md checkout_link btn-outline-accent">{{ Helper::translation(2897,$translate) }}</a>
                                </div>
                            </div>
                            <!-- end .col-md-12 -->
                        </div>
                        @endif
                        @if($cart_count == 0)
                        <div class="row">
                            <div class="col-md-12 offset-md-12 noresult" align="center">
                            {{ Helper::translation(2898,$translate) }}
                            </div>
                        </div>
                        @endif
                        
                        <!-- end .row -->
                    </div>
                    <!-- end /.product_archive2 -->
                </div>
                <!-- end .col-md-12 -->
            </div>
            </form>
            <!-- end .row -->

        </div>
        <!-- end .container -->
    </section>
    
    
    
   @include('footer')
    
   @include('javascript')

</body>

</html>
@else
@include('503')
@endif
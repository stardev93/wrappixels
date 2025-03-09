@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $item['item']->item_name }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
    @include('dynamic-style')
</head>

<body class="preload single_prduct2">

    @include('header')

    <section class="bg-position-center-top" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_banner }}'); padding-bottom: 1px;">
        <div class="container content_above mb-lg-3 pb-4 pt-5">
            <div class="row">
                <div class="col-md-6 offset-md-1">
                    <h1 class="text-white line-height-base">
                    {{ $item['item']->item_name }}
                    </h1>
                </div>

                <div class="col-md-3 offset-md-1">
                    <ul class="breadcrumb">
                        <li style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/') }}">{{ Helper::translation(2862,$translate) }} / </a>
                        </li>
                        <li class="active" style="list-style:none;">
                            <a class="text-white line-height-base" href="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">{{ $item['item']->item_name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="container mb-3 pb-3"  style="margin-top: -3rem">
        <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
            <div class="row">
          <!-- Content-->
                <section class="col-lg-8 pt-2 pt-lg-4 pb-4 mb-lg-3">
                    <div class="pt-2 px-4 pr-lg-0 pl-xl-5">

                      <div class="item-preview item-preview2">
                        <div class="prev-slide">
                            @if($item['item']->video_preview_type!='')
                                @if($item['item']->video_preview_type == 'youtube')
                                    @if($item['item']->video_url != '')
                                        @php
                                        $link = $item['item']->video_url;
                                        $video_id = explode("?v=", $link);
                                        $video_id = $video_id[1];
                                        @endphp
                                        <iframe width="100%" height="430" src="https://www.youtube.com/embed/{{ $video_id }}?rel=0&version=3&loop=1&playlist={{ $video_id }}" frameborder="0" allow="autoplay" scrolling="no">
                                        </iframe>        
                                    @else
                                        <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $item['item']->item_name }}" class="single-thumbnail">
                                    @endif
                                @endif

                                @if($item['item']->video_preview_type == 'mp4')
                                    @if($item['item']->video_file != '')
                                        @if($allsettings->site_s3_storage == 1)
                                            @php $videofileurl = Storage::disk('s3')->url($item['item']->video_file); @endphp
                                            <video width="100%" height="430" controls loop><source src="{{ $videofileurl }}" type="video/mp4">Your browser does not support the video tag.</video>             
                                        @else
                                            <video width="100%" height="430" controls loop><source src="{{ url('/') }}/public/storage/items/{{ $item['item']->video_file }}" type="video/mp4">Your browser does not support the video tag.</video>
                                        @endif
                                    @else
                                        <img src="{{ url('/') }}/resources/views/assets/no-video.png" alt="{{ $item['item']->item_name }}" class="single-thumbnail">
                                    @endif
                                @endif
                            @else  
                                @if($item['item']->item_preview!='')
                                    <a class="gallery-item rounded-lg mb-grid-gutter lightbox" href="{{ url('/') }}/public/storage/items/{{ $item['item']->item_preview }}" ata-lightbox-gallery="mygallery" data-sub-html="Sed do eiusmod tempor">
                                        <img src="{{ url('/') }}/public/storage/items/{{ $item['item']->item_preview }}" alt="{{ $item['item']->item_name }}" class="single-thumbnail">
                                        <span class="gallery-item-caption"></span>
                                    </a>
                                    @if(isset($item_allimage))
                                        @foreach($item_allimage as $image)
                                            <a class="gallery-item rounded-lg mb-grid-gutter lightbox" href="{{ url('/') }}/public/storage/items/{{ $image->item_image }}" data-lightbox-gallery="mygallery" data-sub-html="" hidden>
                                                <img src="{{ url('/') }}/public/storage/items/{{ $image->item_image }}" alt="{{ $image->item_image }}">
                                                <span class="gallery-item-caption"></span>
                                            </a>
                                        @endforeach
                                    
                                        <div class="row">
                                            @foreach($item_allimage as $image)
                                                <div class="col-sm-2">
                                                    <a class="gallery-item rounded-lg mb-grid-gutter lightbox" href="{{ url('/') }}/public/storage/items/{{ $image->item_image }}" data-lightbox-gallery="mygallery" data-sub-html="">
                                                        <img src="{{ url('/') }}/public/storage/items/{{ $image->item_image }}" alt="{{ $image->item_image }}">
                                                        <span class="gallery-item-caption"></span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @else
                                    <a class="gallery-item rounded-lg mb-grid-gutter" href="{{ url('/') }}/public/storage/items/{{ $item['item']->item_preview }}" data-sub-html="Sed do eiusmod tempor">
                                        <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item['item']->item_name }}" class="single-thumbnail">
                                    </a>
                                @endif
                            @endif
                                   
                        </div>
                        <div class="item__preview-thumb d-flex flex-wrap justify-content-between align-items-center border-top pt-3">
                                
                            

                                <div class="action-btns py-2 mr-2">
                                    @if($item['item']->demo_url != '')
                                        <a href="{{ $item['item']->demo_url }}" class="btn btn-outline-accent btn-sm" target="_blank">{{ Helper::translation(3049,$translate) }}</a>
                                    @endif
                                    
                                    <!--                                     
                                    @if($getcount != 0)
                                        <a href="{{ url('/') }}/public/storage/items/{{ $item_image['item']->item_image }}" class="btn btn-outline-accent btn-sm lightbox" data-lightbox-gallery="mygallery">{{ Helper::translation(3050,$translate) }}</a>
                                    @endif 
                                    -->

                                    @if(Auth::guest())
                                    <a href="javascript:void(0);" class="btn btn-outline-accent btn-sm" onClick="alert('Login user only');">
                                        <span class="lnr lnr-heart"></span>{{ Helper::translation(3051,$translate) }}
                                    </a>
                                    @endif

                                    @if (Auth::check())
                                        @if($item['item']->user_id != Auth::user()->id)
                                        <a href="{{ url('/item') }}/{{ base64_encode($item['item']->item_id) }}/favorite/{{ base64_encode($item['item']->item_liked) }}" class="btn btn-outline-accent btn-sm">
                                            <span class="lnr lnr-heart"></span>{{ Helper::translation(3051,$translate) }}
                                        </a>
                                        @endif
                                    @endif
                                    <?php /*?>@if($item['item']->video_url != '')
                                    <a id="feberr-video" video-url="{{ $item['item']->video_url }}" class="btn btn--sm btn--icon theme-button videobtn"><span class="lnr lnr-camera-video"></span> Video</a>
                                    @endif<?php */?>
                                </div>
                                
                               

                            <div class="py-2">
                                <i class="dwg-share-alt font-size-lg align-middle text-muted mr-2"></i>

                                <a class="social-btn sb-outline sb-facebook sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="facebook" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)"><i class="dwg-facebook"></i>
                                </a>       

                                <a class="social-btn sb-outline sb-twitter sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="twitter" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)"><i class="dwg-twitter"></i>
                                </a>

                                <a class="social-btn sb-outline sb-pinterest sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="googleplus" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)"><i class="dwg-google"></i>
                                </a>

                                <a class="social-btn sb-outline sb-linkedin sb-sm ml-2 share-button" data-share-url="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}" data-share-network="linkedin" data-share-text="{{ $item['item']->item_shortdesc }}" data-share-title="{{ $item['item']->item_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/items/{{ $item['item']->item_thumbnail }}" href="javascript:void(0)"><i class="dwg-linkedin"></i>
                                </a>

                            </div>


                                
                    
                    
                            </div>
                            @php $no = 1; @endphp
                            @if(isset($item_allimage))
                                @foreach($item_allimage as $image)
                                @if($no != 1)
                                <a href="{{ url('/') }}/public/storage/items/{{ $image->item_image }}" class="lightbox" data-lightbox-gallery="mygallery" hidden></a>
                                @endif
                                @php $no++; @endphp
                                @endforeach
                            @endif
                            
                            <!-- end /.item__action -->

                            <!-- end /.item__preview-thumb-->
                        </div>
                        <!-- end /.item__preview-thumb-->

                    </div>

                    
                </section>

                                            
            <!-- Sidebar-->
                <aside class="col-lg-4">
                    <hr class="d-lg-none">
                    <form action="{{ route('cart') }}" class="setting_form" method="post" id="order_form" enctype="multipart/form-data">
                        {{ csrf_field() }} 
                        <div class="cz-sidebar-static h-100 ml-auto border-left">
                            <div class="bg-secondary rounded p-3 mb-4">
                                @if($item['item']->free_download == 1)
                                    <p>{{ Helper::translation(3065,$translate) }} 
                                        <strong>{{ Helper::translation(3040,$translate) }}</strong>. {{ Helper::translation(3066,$translate) }}
                                    </p>
                                
                                <div align="center">

                                    @if(Auth::guest())
                                        <a href="{{ URL::to('/login') }}" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate) }} ({{ $item['item']->download_count }})</a>
                                    @else
                                    <a href="{{ URL::to('/item') }}/{{ base64_encode($item['item']->item_token) }}" class="btn btn-primary btn-smn" download> <i class="fa fa-download"></i> {{ Helper::translation(3067,$translate) }} ({{ $item['item']->download_count }})</a>
                                    @endif

                                </div>
                                @endif
                            </div>

                    
                            <div class="accordion" id="licenses">
                                @php if($item['item']->item_flash == 1)
                                { 
                                    $item_price = round($item['item']->regular_price/2);
                                    $extend_item_price = round($item['item']->extended_price/2);
                                } 
                                else 
                                { 
                                    $item_price = $item['item']->regular_price;
                                    $extend_item_price = $item['item']->extended_price; 
                                } 
                                @endphp

                                <div class="card border-top-0 border-left-0 border-right-0">
                                    <div class="card-header d-flex justify-content-between align-items-center py-3 border-0">
                                        <div class="custom-control custom-radio">

                                            <input class="custom-control-input" type="radio" name="item_price" value="{{ base64_encode($item_price) }}_regular" id="opt1" checked="" style="padding-top: -100px">
                                            <label class="custom-control-label font-weight-medium text-dark" for="opt1" data-toggle="collapse" data-target="#standard-license" aria-expanded="true" data-price="13">{{ Helper::translation(3072,$translate) }}</label>

                                        </div>
                                        <h5 class="mb-0 text-accent font-weight-normal">{{ $allsettings->site_currency }} {{$item_price}}</h5>
                                    </div>
                                    <div class="collapse show" id="standard-license" data-parent="#licenses" style="">
                                        <div class="card-body py-0 pb-2">
                                            
                                            <ul class="list-unstyled font-size-sm">
                                               <li>
                                                    <div class="item-features">
                                                        <ul>
                                                           <li><span class="lnr lnr-checkmark-circle right font-size-ms"></span> {{ Helper::translation(3068,$translate) }} {{ $allsettings->site_title }}</li>
                                                           @if($item['item']->future_update == 1)
                                                           <li><span class="lnr lnr-checkmark-circle righ font-size-mst"></span>  {{ Helper::translation(3069,$translate) }}</li>
                                                           @else
                                                           <li><span class="lnr lnr-cross-circle wrong font-size-ms"></span>  {{ Helper::translation(3069,$translate) }}</li>
                                                           @endif
                                                           
                                                           @if($item['item']->item_support == 1)
                                                           <li><span class="lnr lnr-checkmark-circle right font-size-ms"></span> {{ Helper::translation(3070,$translate) }} {{ $item['item']->username }}</li>
                                                           @else
                                                           <li><span class="lnr lnr-cross-circle wrong font-size-ms"></span> {{ Helper::translation(3070,$translate) }} {{ $item['item']->username }}</li>
                                                           @endif
                                                           
                                                        </ul>
                                                    </div>
                                               </li>
                                              
                                            </ul>

                                        </div>
                                    </div>
                                </div>

                               


                                @if($item['item']->extended_price != 0)
                                
                                <div class="card border-bottom-0 border-left-0 border-right-0">
                                    <div class="card-header d-flex justify-content-between align-items-center py-3 border-0">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="item_price" id="license-ext" value="{{ base64_encode($extend_item_price) }}_extended">
                                            <label class="custom-control-label font-weight-medium text-dark collapsed" for="license-ext" data-toggle="collapse" data-target="#extended-license" aria-expanded="false">{{ Helper::translation(3073,$translate) }}</label>
                                        </div>
                                        <h5 class="mb-0 text-accent font-weight-normal">{{ $allsettings->site_currency }} {{$extend_item_price}} </h5>
                                    </div>
                                    <div class="collapse" id="extended-license" data-parent="#licenses" style="">
                                        <div class="card-body py-0 pb-2">
                                        <ul class="list-unstyled font-size-sm">
                                               <li>
                                                    <div class="item-features">
                                                        <ul>
                                                           <li><span class="lnr lnr-checkmark-circle right font-size-ms"></span> {{ Helper::translation(3068,$translate) }} {{ $allsettings->site_title }}</li>
                                                           @if($item['item']->future_update == 1)
                                                           <li><span class="lnr lnr-checkmark-circle righ font-size-mst"></span>  {{ Helper::translation(3069,$translate) }}</li>
                                                           @else
                                                           <li><span class="lnr lnr-cross-circle wrong font-size-ms"></span>  {{ Helper::translation(3069,$translate) }}</li>
                                                           @endif
                                                           
                                                           @if($item['item']->item_support == 1)
                                                           <li><span class="lnr lnr-checkmark-circle right font-size-ms"></span> {{ Helper::translation(3070,$translate) }} {{ $item['item']->username }}</li>
                                                           @else
                                                           <li><span class="lnr lnr-cross-circle wrong font-size-ms"></span> {{ Helper::translation(3070,$translate) }} {{ $item['item']->username }}</li>
                                                           @endif
                                                           
                                                        </ul>
                                                    </div>
                                               </li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                        
                            <hr>
                            
                            <p class="mt-2 mb-3"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="font-size-xs">What does support include?</a></p>
                            <div class="modal fade" id="myModal" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">What does support include?</h4>
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Regular License</strong></p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                            <p><strong>Extended License</strong></p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                            <p>&nbsp;</p>                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                          

                            <div class="purchase-button">

                                @if(Auth::guest())
                                <a href="javascript:void(0);" class="btn btn-primary btn-shadow btn-block mt-4" onClick="alert('Login user only');">
                                        <span class="lnr lnr-cart"></span> {{ Helper::translation(3074,$translate) }}</a>
                                @endif 

                                @if (Auth::check())
                                    @if($item['item']->user_id == Auth::user()->id)
                                        <a href="{{ URL::to('/edit-item') }}/{{ $item['item']->item_token }}" class="btn btn--md btn-outline-accent">{{ Helper::translation(2935,$translate) }}</a>
                                    @else
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="item_id" value="{{ $item['item']->item_id }}">
                                            <input type="hidden" name="item_name" value="{{ $item['item']->item_name }}">
                                            <input type="hidden" name="item_user_id" value="{{ $item['item']->user_id }}">
                                            <input type="hidden" name="item_token" value="{{ $item['item']->item_token }}">
                                            @if($checkif_purchased == 0)
                                                @if(Auth::user()->id != 1)
                                                <!--   <button type="submit" class="btn btn--md theme-button cart-btn"><span class="lnr lnr-cart"></span> {{ Helper::translation(3074,$translate) }}</button> -->
                                                    <button type="submit" class="btn btn-primary btn-shadow btn-block mt-4"><i class="dwg-cart font-size-lg mr-2"></i>{{ Helper::translation(3074,$translate) }}</button>
                                                @endif 
                                            @endif    
                                    @endif
                                @endif    

                                
                            </div>

                            
                            <div class="mt-4">
                            </div>
                            
                            

                            <div class="author-card sidebar-card ">
                                <div class="card-title">
                                    <h4>{{ Helper::translation(3076,$translate) }}</h4>
                                </div>

                                <div class="author-infos">
                                    <div class="author_avatar">
                                        
                                        @if($item['item']->user_photo != '')
                                                <img src="{{ url('/') }}/public/storage/users/{{ $item['item']->user_photo }}" alt="{{ $item['item']->name }}" width="100">
                                                @else
                                                <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $item['item']->name }}" width="100">
                                                @endif
                                    </div>

                                    <div class="author">
                                        <h4>{{ $item['item']->username }}</h4>
                                        <p>{{ Helper::translation(3077,$translate) }} {{ date("F Y", strtotime($item['item']->created_at)) }}</p>
                                    </div>
                                    <!-- end /.author -->
                               
                                    <div class="social social--color--filled">
                                        <ul>
                                            @if($item['item']->country_badge == 1)
                                                @if(isset($country['view']->country_badges) && $country['view']->country_badges != "")
                                                    <li>
                                                        <img src="{{ url('/') }}/public/storage/flag/{{ $country['view']->country_badges }}" border="0" class="icon-badges" title="Located in {{ $country['view']->country_name }}">  
                                                    </li>
                                                @endif
                                            @endif
                                            
                                            @if($item['item']->exclusive_author == 1)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->exclusive_author_icon }}" border="0" class="other-badges" title="Exclusive Author: Sells items exclusively on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($trends != 0)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->trends_icon }}" border="0" class="other-badges" title="Trendsetter: Had an item that was trending">
                                            </li>
                                            @endif
                                            
                                            @if($item['item']->item_featured == 'yes')
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}" border="0" class="other-badges" title="Featured Item: Had an item featured on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($item['item']->free_download == 1)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->free_item_icon }}" border="0" class="other-badges" title="Free Item : Contributed a free file of this item">
                                            </li>
                                            @endif
                                            
                                            @if($year == 1)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->one_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            @if($year == 2)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->two_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            @if($year == 3)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->three_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            
                                            @if($year == 4)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->four_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            @if($year == 5)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->five_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif 
                                            
                                            @if($year == 6)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->six_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            @if($year == 7)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->seven_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            @if($year == 8)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->eight_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            @if($year == 9)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->nine_year_icon }}" border="0" class="other-badges" title="{{ $year }} Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over {{ $year }} years">
                                            </li>
                                            @endif
                                            
                                            @if($year >= 10)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->ten_year_icon }}" border="0" class="other-badges" title="@if($year >= 10) 10+ @else {{ $year }} @endif Years of Membership: Has been part of the {{ $allsettings->site_title }} Community for over @if($year >= 10) 10+ @else {{ $year }} @endif years">
                                            </li>
                                            @endif
                                            
                                            @if($sold_amount >= $badges['setting']->author_sold_level_one && $badges['setting']->author_sold_level_two > $sold_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_one_icon }}" border="0" class="other-badges" title="Author Level 1: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_one }}+ on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($sold_amount >= $badges['setting']->author_sold_level_two &&  $badges['setting']->author_sold_level_three > $sold_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_two_icon }}" border="0" class="other-badges" title="Author Level 2: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_two }}+ on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($sold_amount >= $badges['setting']->author_sold_level_three &&  $badges['setting']->author_sold_level_four > $sold_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->	author_sold_level_three_icon }}" border="0" class="other-badges" title="Author Level 3: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_three }}+ on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            
                                            @if($sold_amount >= $badges['setting']->author_sold_level_four &&  $badges['setting']->author_sold_level_five > $sold_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_four_icon }}" border="0" class="other-badges" title="Author Level 4: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_four }}+ on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($sold_amount >= $badges['setting']->author_sold_level_five &&  $badges['setting']->author_sold_level_six > $sold_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_five_icon }}" border="0" class="other-badges" title="Author Level 5: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_five }}+ on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            
                                            @if($sold_amount >= $badges['setting']->author_sold_level_six) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_sold_level_six_icon }}" border="0" class="other-badges" title="Author Level 6: Has sold {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($sold_amount >= $badges['setting']->author_sold_level_six)
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" border="0" class="other-badges" title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($collect_amount >= $badges['setting']->author_collect_level_one && $badges['setting']->author_collect_level_two > $collect_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_one_icon }}" border="0" class="other-badges" title="Collector Level 1: Has collected {{ $badges['setting']->author_collect_level_one }}+ items on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($collect_amount >= $badges['setting']->author_collect_level_two && $badges['setting']->author_collect_level_three > $collect_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_two_icon }}" border="0" class="other-badges" title="Collector Level 2: Has collected {{ $badges['setting']->author_collect_level_two }}+ items on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($collect_amount >= $badges['setting']->author_collect_level_three && $badges['setting']->author_collect_level_four > $collect_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_three_icon }}" border="0" class="other-badges" title="Collector Level 3: Has collected {{ $badges['setting']->author_collect_level_three }}+ items on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($collect_amount >= $badges['setting']->author_collect_level_four && $badges['setting']->author_collect_level_five > $collect_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_four_icon }}" border="0" class="other-badges" title="Collector Level 4: Has collected {{ $badges['setting']->author_collect_level_four }}+ items on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($collect_amount >= $badges['setting']->author_collect_level_five && $badges['setting']->author_collect_level_six > $collect_amount) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_five_icon }}" border="0" class="other-badges" title="Collector Level 5: Has collected {{ $badges['setting']->author_collect_level_five }}+ items on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            @if($collect_amount >= $badges['setting']->author_collect_level_six) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_collect_level_six_icon }}" border="0" class="other-badges" title="Collector Level 6: Has collected {{ $badges['setting']->author_collect_level_six }}+ items on {{ $allsettings->site_title }}">
                                            </li>
                                            @endif
                                            
                                            
                                            @if($referral_count >= $badges['setting']->author_referral_level_one && $badges['setting']->author_referral_level_two > $referral_count) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_one_icon }}" border="0" class="other-badges" title="Affiliate Level 1: Has referred {{ $badges['setting']->author_referral_level_one }}+ members">
                                            </li>
                                            @endif
                                            
                                            @if($referral_count >= $badges['setting']->author_referral_level_two && $badges['setting']->author_referral_level_three > $referral_count) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_two_icon }}" border="0" class="other-badges" title="Affiliate Level 2: Has referred {{ $badges['setting']->author_referral_level_two }}+ members">
                                            </li>
                                            @endif
                                            
                                            @if($referral_count >= $badges['setting']->author_referral_level_three && $badges['setting']->author_referral_level_four > $referral_count) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_three_icon }}" border="0" class="other-badges" title="Affiliate Level 3: Has referred {{ $badges['setting']->author_referral_level_three }}+ members">
                                            </li>
                                            @endif
                                            
                                            @if($referral_count >= $badges['setting']->author_referral_level_four && $badges['setting']->author_referral_level_five > $referral_count) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_four_icon }}" border="0" class="other-badges" title="Affiliate Level 4: Has referred {{ $badges['setting']->author_referral_level_four }}+ members">
                                            </li>
                                            @endif
                                            
                                            @if($referral_count >= $badges['setting']->author_referral_level_five && $badges['setting']->author_referral_level_six > $referral_count) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_five_icon }}" border="0" class="other-badges" title="Affiliate Level 5: Has referred {{ $badges['setting']->author_referral_level_five }}+ members">
                                            </li>
                                            @endif
                                            
                                            
                                            @if($referral_count >= $badges['setting']->author_referral_level_six) 
                                            <li>
                                            <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->author_referral_level_six_icon }}" border="0" class="other-badges" title="Affiliate Level 6: Has referred {{ $badges['setting']->author_referral_level_six }}+ members">
                                            </li>
                                            @endif
                                            
                                        </ul>
                                    </div>

                                    <div class="author-btn">
                                        <a href="{{ url('/user') }}/{{ $item['item']->username }}" class="btn btn--sm btn-outline-accent">{{ Helper::translation(3078,$translate) }}</a>
                                        
                                    </div>
                                
                                </div>
                            </div>


                          

                            <div class="bg-secondary rounded p-3 mt-4 mb-2"><i class="dwg-download h5 text-muted align-middle mb-0 mt-n1 mr-2"></i>
                                <span class="d-inline-block h6 mb-0 mr-1">{{ $item['item']->item_sold }}</span><span class="font-size-sm">{{ Helper::translation(3039,$translate) }}</span>
                            </div>
                            
                            <div class="bg-secondary rounded p-3 mb-2">
                                <div class="rating product--rating" align="center"> 
                                
                                <ul>
                                    @if($getreview == 0)
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
                                    @else
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
                                    
                                    
                                    @endif
                                </ul>
                                <span class="rating__count">( {{ $getreview }} {{ Helper::translation(3080,$translate) }} )</span>
                            </div>
                            </div>

                            <div class="bg-secondary rounded p-3 mb-4"><i class="dwg-chat h5 text-muted align-middle mb-0 mt-n1 mr-2"></i>
                                <span class="d-inline-block h6 mb-0 mr-1">{{ $comment_count }}</span><span class="font-size-sm">{{ Helper::translation(3054,$translate) }}</span>
                            </div>

                            <ul class="list-unstyled font-size-sm">
                                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <span class="text-dark font-weight-medium">{{ Helper::translation(3082,$translate) }}</span>
                                    <span class="text-muted">{{ date("d F Y", strtotime($item['item']->created_item)) }}</span>
                                </li>
                                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <span class="text-dark font-weight-medium">{{ Helper::translation(3083,$translate) }}</span>
                                    <span class="text-muted">{{ date("d F Y", strtotime($item['item']->updated_item)) }} </span>
                                </li>
                                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <span class="text-dark font-weight-medium">{{ Helper::translation(3084,$translate) }}</span>
                                    <span class="text-muted">{{ $category_name }}</span>
                                </li>
                                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <span class="text-dark font-weight-medium">{{ Helper::translation(2937,$translate) }}</span>
                                    <span class="text-muted">{{ str_replace('-',' ',$item['item']->item_type) }}</span>
                                </li>
                                @if(count($viewattribute['details']) != 0)
                                @foreach($viewattribute['details'] as $view_attribute)
                                <li class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                    <span class="text-dark font-weight-medium">{{ $view_attribute->item_attribute_label }}</span>
                                    <span class="text-muted">{{ $view_attribute->item_attribute_values }}</span>
                                </li>
                                @endforeach
                                @endif
                                <li class="justify-content-between pb-3 border-bottom">
                                    <span class="text-dark font-weight-medium">{{ Helper::translation(2974,$translate) }}</span>
                                    <p class="info">
                                    
                                    @foreach($item_tags as $tags)
                                    <span class="text-right">
                                        <a href="{{ url('/tag') }}/item/{{ strtolower(str_replace(' ','-',$tags)) }}" class="item-tags item-tags-color">{{ $tags }}</a>
                                    </span>
                                    @endforeach
                                    
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </section>


    <section class="single-product-desc">
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
                <div class="col-lg-12">
                    

                    <div class="item-info">
                        <div class="item-navigation">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="#product-details" class="active" aria-controls="product-details" role="tab" data-toggle="tab">{{ Helper::translation(3053,$translate) }}</a>
                                </li>
                                <li>
                                    <a href="#product-comment" aria-controls="product-comment" role="tab" data-toggle="tab">{{ Helper::translation(3054,$translate) }} <span>({{ $comment_count }})</span></a>
                                </li>
                                <li>
                                    <a href="#product-review" aria-controls="product-review" role="tab" data-toggle="tab">{{ Helper::translation(3043,$translate) }}
                                        <span>({{ $getreview }})</span>
                                    </a>
                                </li>
                                @if(Auth::guest())
                                <li>
                                    <a href="#product-support" aria-controls="product-support" role="tab" data-toggle="tab">{{ Helper::translation(3055,$translate) }}</a>
                                </li>
                                @endif
                                @if (Auth::check())
                                @if($item['item']->user_id != Auth::user()->id)
                                 <li>
                                    <a href="#product-support" aria-controls="product-support" role="tab" data-toggle="tab">{{ Helper::translation(3055,$translate) }}</a>
                                </li>
                                @endif
                                @endif
                                
                                
                                
                            </ul>
                        </div>
                        <!-- end /.item-navigation -->

                        <div class="tab-content">
                        
                                                    
                            <div class="tab-pane fade show product-tab active" id="product-details">
                                <div class="tab-content-wrapper">
                                    {!! html_entity_decode($item['item']->item_desc) !!}
                                </div>
                            </div>
                            <!-- end /.tab-content -->

                            <div class="fade tab-pane product-tab" id="product-comment">
                                <div class="thread">
                                
                                                                
                                    <ul class="media-list thread-list" id="listShow">
                                        
                                        
                                        @foreach ($comment['view'] as $parent)
                                        <li class="single-thread commli-item">
                                            <div class="media">
                                                <div class="media-left">
                                                <a href="{{ URL::to('/user') }}/{{ $parent->username }}">
                                                       
                                                        @if($parent->user_photo!='')
                                                    <img  src="{{ url('/') }}/public/storage/users/{{ $parent->user_photo }}" alt="{{ $parent->username }}" class="media-object">
                                                    @else
                                                    <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $parent->username }}" class="media-object">
                                                    @endif
                                                    </a>
                                                    
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="media-heading">
                                                            <a href="{{ URL::to('/user') }}/{{ $parent->username }}">
                                                                <h4>{{ $parent->username }}</h4>
                                                            </a>
                                                            <span>{{ date('d F Y, H:i:s', strtotime($parent->comm_date)) }}</span>
                                                        </div>
                                                        
                                                        @if($parent->id == $item['item']->user_id)
                                                        <span class="comment-tag buyer">{{ Helper::translation(3057,$translate) }}</span>
                                                        @endif
                                                        @if (Auth::check())
                                                        @if($item['item']->user_id == Auth::user()->id)
                                                        <a href="javascript:void(0);" class="reply-link theme-color">{{ Helper::translation(3056,$translate) }}</a>
                                                        @endif
                                                        @if($parent->comm_user_id == Auth::user()->id)
                                                        <a href="javascript:void(0);" class="reply-link theme-color">{{ Helper::translation(3056,$translate) }}</a>
                                                        @endif
                                                        @endif
                                                    </div>
                                                    <p>{{ $parent->comm_text }}</p>
                                                </div>
                                            </div>
                                            
                                            
                                            <ul class="children">
                                            @foreach ($parent->replycomment as $child)
                                                <li class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="{{ URL::to('/user') }}/{{ $child->username }}">
                                                       
                                                        @if($child->user_photo!='')
                                                    <img  src="{{ url('/') }}/public/storage/users/{{ $child->user_photo }}" alt="{{ $child->username }}" class="media-object">
                                                    @else
                                                    <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $child->username }}" class="media-object">
                                                    @endif
                                                    </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <a href="{{ URL::to('/user') }}/{{ $child->username }}">
                                                                <h4>{{ $child->username }}</h4>
                                                                </a>
                                                                <span>{{ date('d F Y, H:i:s', strtotime($child->comm_date)) }}</span>
                                                            </div>
                                                            @if($child->id == $item['item']->user_id)
                                                            <span class="comment-tag buyer">{{ Helper::translation(3057,$translate) }}</span>
                                                            @endif
                                                            <!--<span class="comment-tag author">Author</span>-->
                                                            <p>{{ $child->comm_text }}</p>
                                                        </div>
                                                    </div>

                                                </li>
                                                @endforeach
                                            </ul>
                                            
                                            <!-- comment reply -->
                                            @if (Auth::check())
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                                       
                                                        @if(Auth::user()->user_photo!='')
                                        <img  src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->username }}" class="media-object">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->username }}" class="media-object">
                                        @endif
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="{{ route('reply-post-comment') }}" class="comment-reply-form" id="item_form" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <textarea name="comm_text" placeholder="{{ Helper::translation(3059,$translate) }}" data-bvalidator="required"></textarea>
                                                    <input type="hidden" name="comm_user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="comm_item_user_id" value="{{ $item['item']->user_id }}">
                                                    <input type="hidden" name="comm_item_id" value="{{ $item['item']->item_id }}">
                                                    <input type="hidden" name="comm_id" value="{{ $parent->comm_id }}">
                                                    <input type="hidden" name="comm_item_url" value="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">
                                                   <button class="btn btn--sm btn-outline-accent">{{ Helper::translation(3058,$translate) }}</button>
                                                </form>
                                                </div>
                                            </div>
                                            @endif
                                            <!-- comment reply -->
                                        </li>
                                       @endforeach
                                       
                                       
                                       
                                    </ul>
                                    <!-- end /.media-list -->

                                    <div class="pagination-area pagination-area2">
                                        <nav class="navigation pagination" role="navigation">
                                           <div class="pagination-area">
                                                <div class="turn-page" id="commpager"></div>
                                           </div> 
                                        </nav>
                                    </div>
                                    <!-- end /.comment pagination area -->

                                    @if (Auth::check())
                                    @if($item['item']->user_id != Auth::user()->id)
                                    <div class="comment-form-area">
                                        <h4>Leave a comment</h4>
                                        <!-- comment reply -->
                                        <div class="media comment-form">
                                            <div class="media-left">
                                            <a href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
                                                       
                                                        @if(Auth::user()->user_photo!='')
                                        <img  src="{{ url('/') }}/public/storage/users/{{ Auth::user()->user_photo }}" alt="{{ Auth::user()->username }}" class="media-object">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ Auth::user()->username }}" class="media-object">
                                        @endif
                                                    </a>
                                                
                                            </div>
                                            <div class="media-body">
                                                <form action="{{ route('post-comment') }}" class="comment-reply-form" id="item_form" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                    <textarea name="comm_text" placeholder="{{ Helper::translation(3059,$translate) }}" data-bvalidator="required"></textarea>
                                                    <input type="hidden" name="comm_user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="comm_item_user_id" value="{{ $item['item']->user_id }}">
                                                    <input type="hidden" name="comm_item_id" value="{{ $item['item']->item_id }}">
                                                    <input type="hidden" name="comm_item_url" value="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">
                                                   <button class="btn btn--sm btn-outline-accent">{{ Helper::translation(3058,$translate) }}</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </div>
                                    @endif
                                    @endif
                                    
                                    
                                </div>
                                <!-- end /.comments -->
                            </div>
                            <!-- end /.product-comment -->

                            <div class="tab-pane fade product-tab" id="product-review">
                                <div class="thread thread_review">
                                    <ul class="media-list thread-list" id="listShow">
                                        @foreach($getreviewdata['view'] as $rating)
                                        <li class="single-thread li-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="{{ URL::to('/user') }}/{{ $rating->username }}">
                                                       
                                                        @if($rating->user_photo!='')
                                        <img  src="{{ url('/') }}/public/storage/users/{{ $rating->user_photo }}" alt="{{ $rating->username }}" class="media-object">
                                        @else
                                        <img src="{{ url('/') }}/public/img/no-user.png" alt="{{ $rating->username }}" class="media-object">
                                        @endif
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="{{ URL::to('/user') }}/{{ $rating->username }}">
                                                                    <h4>{{ $rating->username }}</h4>
                                                                </a>
                                                                <span>{{ date('d F Y H:i:s', strtotime($rating->rating_date)) }}</span>
                                                            </div>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    @if($rating->rating == 0)
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
                                                                    @if($rating->rating == 1)
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
                                                                    @if($rating->rating == 2)
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
                                                                    @if($rating->rating == 3)
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
                                                                    @if($rating->rating == 4)
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
                                                                    @if($rating->rating == 5)
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
                                                            <span class="review_tag">{{ $rating->rating_reason }}</span>
                                                        </div>
                                                        
                                                    </div>
                                                    <p>{{ $rating->rating_comment }}</p>
                                                </div>
                                            </div>

                                        </li>
                                        @endforeach

                                        
                                    </ul>
                                    <!-- end /.media-list -->

                                    <div class="pagination-area pagination-area2">
                                        <nav class="navigation pagination " role="navigation">
                                          <div class="pagination-area">
                                            <div class="turn-page" id="pager"></div>
                                          </div>  
                                        </nav>
                                    </div>
                                    <!-- end /.comment pagination area -->
                                </div>
                                <!-- end /.comments -->
                            </div>
                            <!-- end /.product-comment -->

                            <div class="tab-pane fade product-tab" id="product-support">
                                <div class="support">
                                    <div class="support__title">
                                        <h3>{{ Helper::translation(3060,$translate) }}</h3>
                                    </div>
                                    <div class="support__form">
                                        <div class="usr-msg">
                                            @if(Auth::guest())
                                            <p>{{ Helper::translation(3061,$translate) }}
                                                <a href="{{ URL::to('/login') }}" class="theme-color">{{ Helper::translation(3020,$translate) }}</a> {{ Helper::translation(3062,$translate) }}</p>
                                                @endif

                                            @if (Auth::check())
                                            <form action="{{ route('support') }}" class="support_form" id="support_form" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="subj">{{ Helper::translation(3063,$translate) }}:</label>
                                                    <input type="text" id="support_subject" name="support_subject" class="text_field" placeholder="Enter your subject" data-bvalidator="required">
                                                </div>

                                                <div class="form-group">
                                                    <label for="supmsg">{{ Helper::translation(2918,$translate) }}: </label>
                                                    <textarea class="text_field" id="support_msg" name="support_msg" placeholder="Enter your message" data-bvalidator="required"></textarea>
                                                </div>
                                                <input type="hidden" name="to_address" value="{{ $item['item']->email }}">
                                                <input type="hidden" name="to_name" value="{{ $item['item']->username }}">
                                                <input type="hidden" name="from_address" value="{{ Auth::user()->email }}">
                                                <input type="hidden" name="from_name" value="{{ Auth::user()->username }}">
                                                <input type="hidden" name="item_url" value="{{ URL::to('/item') }}/{{ $item['item']->item_slug }}/{{ $item['item']->item_id }}">
                                                <button type="submit" class="btn btn--md btn-outline-accent">{{ Helper::translation(3064,$translate) }}</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.product-support -->

                            
                            <!-- end /.product-faq -->
                        </div>
                        <!-- end /.tab-content -->
                    </div>
                    <!-- end /.item-info -->
                </div>
                <!-- end /.col-md-8 -->

                <div class="col-lg-4">
             
                <div  class="col-lg-4" align="center">
                </div>
                <form action="{{ route('cart') }}" class="setting_form" method="post" id="order_form" enctype="multipart/form-data">
                {{ csrf_field() }} 
                @php if($item['item']->item_flash == 1)
                { 
                $item_price = round($item['item']->regular_price/2);
                $extend_item_price = round($item['item']->extended_price/2);
                } 
                else 
                { 
                $item_price = $item['item']->regular_price;
                $extend_item_price = $item['item']->extended_price; 
                } 
                @endphp
                    <aside class="sidebar sidebar--single-product">
                        
                        <!-- end /.sidebar--card -->
                        @if($item['item']->item_featured == 'yes')
                        <div class="sidebar-card card--metadata">
                            <div>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->featured_item_icon }}" border="0" class="single-badges" title="Featured Item"> {{ Helper::translation(3075,$translate) }} {{ $allsettings->site_title }}
                            </div>
                            
                        </div>    
                        @endif
                        @if($sold_amount >= $badges['setting']->author_sold_level_six)
                        <div class="sidebar-card card--metadata">
                            <div>
                                    <img src="{{ url('/') }}/public/storage/badges/{{ $badges['setting']->power_elite_author_icon }}" border="0" class="single-badges" title="{{ $badges['setting']->author_sold_level_six_label }} : Sold more than {{ $allsettings->site_currency }} {{ $badges['setting']->author_sold_level_six }}+ on {{ $allsettings->site_title }}"> {{ $badges['setting']->author_sold_level_six_label }}
                            </div>
                            
                        </div> 
                        @endif
                 
                    </aside>
                    </form>
                </div>
                <!-- end /.col-md-4 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
 

    <section class="container mb-lg-1" data-aos="fade-up" data-aos-delay="200">
        <div class="container" id="demo">

            <div class="col-md-12 pt-4 mb-4">
                <div class="section-title">
                    <h1>{{ Helper::translation(3087,$translate) }}
                        <span class="highlighted">by {{ $item['item']->username }}</span>
                    </h1>
                </div>
            </div>
            
            <div id="demo" class="box jplist"> 
            
                <div class="row pt-2 mx-n2">
                    @foreach($itemData['item'] as $item)
                    
                        <div class="col-lg-4 col-md-6 col-sm-6 px-2 mb-grid-gutter">
                    
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
    
</body>

</html>
@else
@include('503')
@endif